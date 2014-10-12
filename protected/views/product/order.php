<?php
/* @var $this ProductController */
/* @var $model Product */

?>

<!-- Start right Sidebar  -->
<div class="row">
    <?php $this->renderPartial('producttype',array('topTypeArr'=>$topTypeArr,'topType'=>$topType)); ?>

    <div class="span8" >

        <h2 style="margin-top: 50px;">您的订单详情如下：</h2>
        <hr id="order-lists">
<!--        <h3>商品信息：</h3>-->
<!--        <hr>-->

        <h3>送货信息：</h3>
        <div class="wrap">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" style="width: 60px;">姓名</label>
                        <div >
                            <input id="realname" value="<?php echo $user->realname?>" type="text"  class="input-large" required placeholder="必填项">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" style="width: 60px;">手机</label>
                        <div >
                            <input id="phone" value="<?php echo $user->telephone?>"type="text" class="input-large" required placeholder="必填项">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" style="width: 60px;">送货地址</label>
                        <div >
                            <table class="table">
                                <tr>
                                    <td>学校</td><td>宿舍楼</td><td>宿舍号</td>
                                </tr>
                                <tr>
                                    <td id="university"><?php echo $university?></td>
                                    <td id="service"><?php echo $serviceaddress?></td>
                                    <td><input id="dorm" type="text" class="input-mini" value="<?php echo $user->dorm?>"></td>
                                </tr>
                            </table>
                            <!--
                            <textarea id="address" class="form-control" rows="3" style="width: 80%">
                                <?php //echo $user->address?>
                            </textarea>
                            -->
                        </div>
                    </div>

                            <div class="row">
                                <div class="well" style="margin-top:25px;padding: 15px 210px;">
                                    <button class="btn" type="button" id="submitOrder"
                                            style="font-size: 20px;
                        font-weight: bold;height: 70px;width: 200px;background-color: #C51B00">
                                        提交订单
                                    </button>
                                </div>
                            </div>
                </fieldset>
        </div>

    </div>

</div>
<!-- </div>
</div> -->

<!-- End right Sidebar  -->

<input id="username" type="hidden" value="<?php echo $user->username?>">

</div>

<script>

    var products;
    $(function(){
        products = getAllProduct();
        if(products != null){
            var html_str ='';
            var totalNum = 0;
            var totalPrice = 0;
            for(var i=0;i<products.length;i++){
                var product = products[i];
                html_str += '<div class="row" style="margin:0 0 0 10px;" >'
                    +'<div style="width: 100px;float: left;"><a href="#">'
                    +'<img style="height: 90px;width: 100px;" class="thumbnail"  src="'+product.Pic+'">'
                    +'</a></div><div class="span2" style="margin-left: 30px;padding:22px 0;"><h4 style="color: #BB1E4A">'+product.Name+'</h4>'
                    +'</div><div style="width: 100px;float: left;padding:22px 0;" style="padding:22px 0;"><h4 >单价：'
                    +product.Price+'￥</h4></div><div class="span1" style="padding:22px 0;"><h4 >数量：'+product.Quantity+'</h4></div>'
                    +'<div class="span2" style="padding:22px 25px;"><h4 >总计：'+product.total+'</h4></div>'
                    +'</div><hr>';
                totalNum  = totalNum + parseInt(product.Quantity);
                totalPrice  = totalPrice + parseFloat(product.total);
            }
            html_str+='<div class="row" style="margin:0 0 0 10px;" >'
            +'<div style="width: 110px;float: left;margin:0 0 0 -10px;"><h4 >订单总计：</h4></div>'
            +'<div class="span2" style="margin-left: 30px;padding:22px 0;"></div>'
            +'<div style="width: 100px;float: left;padding:22px 0;" style="padding:22px 0;"></div>'
            +'<div class="span1" ><h4 >总量：'+totalNum+'</h4></div>'
            +'<div class="span2" style="padding:0 25px;"><h4 >总额：'+totalPrice+'</h4></div>'
            +'</div><hr>';
            $("#order-lists").after(html_str);
        }
    });


    $("#submitOrder").live("click",function(){
        //获取送货信息
        var info = new Object();
        info.name = $("#realname").val();
        info.phone = $("#phone").val();
        info.address = $("#university").text()+$("#service").text()+$("#dorm").val();
        info.username =  $("#username").val();

        products = getAllProduct();
        if(products != null){
            var totalPrice = 0;
            for(var i=0;i<products.length;i++){
                var product = products[i];
                totalPrice = totalPrice + parseFloat(product.total);
            }
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'products':products,'totalPrice':totalPrice,'info':info,'fid':<?php echo $_GET['fid']?>},
                url:'?r=order/create',
                success:function(json) {
                    var result = json.result;
                    if(result == "ok"){
                        alert('订单提交成功，可在个人中心-我的订单中查看您的订单');
                        //清除所有商品的cookie

                        //转向订单详情页面
                        var orderId = json.orderId;
                        window.location.href="?r=product/OrderDetail&id="+orderId;
                    }else{
                        if(result == 'guest'){
                            window.location.href="<?php echo Yii::app()->createUrl('user/addresstmp'); ?>";
                        }else{
                            alert('提交出错');
                        }
                    }
                }
            });
        }
    });

</script>