<?php
/* @var $this ProductController */
/* @var $model Product */

//
//$this->menu=array(
//	array('label'=>'List Product', 'url'=>array('index')),
//	array('label'=>'Create Product', 'url'=>array('create')),
//	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Product', 'url'=>array('admin')),
//);
?>

<!-- Start right Sidebar  -->
<div class="row">
    <?php $this->renderPartial('producttype',array('topTypeArr'=>$topTypeArr,'topType'=>$topType)); ?>
    <div class="span8" >

        <h2 style="margin-top: 50px;">购物车列表</h2>
        <hr id="cart-lists">
        <div class="row">
            <div class="well" style="margin-top:25px;padding: 15px 210px;">
                <button class="btn" type="button" id="submitOrder"
                        style="font-size: 20px;
    font-weight: bold;height: 70px;width: 200px;background-color: #C51B00">
                    生成订单
                </button>
            </div>

        </div>

    </div>

</div>
<!-- </div>
</div> -->

<!-- End right Sidebar  -->

<input id="kucun" type="hidden" value="20">

</div>

<script>

    function reduceProduct(No){
        var nr = $("#"+No).val();
        if(nr > 1){
            nr--;
            $("#"+No).val(nr);
            var price = $("#price_"+No).val();
            addProduct(No,"",price,"",-1);
            var total = parseFloat(price)*parseInt(nr);
            $("#total_"+No).text("￥："+total);
        }
    }
    function addItem(No){
        var na = $("#"+No).val();
        na++;
        $("#"+No).val(na);
        var priceId = "price_"+No;
        var price = $("#"+priceId).val();
        addProduct(No,"",price,"",1);
        var total = parseFloat(price)*parseInt(na);
        $("#total_"+No).text("￥："+total);
//        var kc = $("#kucun").val();
//        kc = parseInt(kc);
//        if(na < kc){
//            na++;
//            $("#buy-number").val(na);
//        }else{
//            alert("这款商品实在是太畅销了，仅剩"+na+"份了，我们将马上进货，给您造成的困扰敬请谅解，谢谢");
//        }
    }

    function delItem(No){
        delProduct(No);
        $("#block_"+No).remove();
        products.length--;
        if(products.length == 0){
            $("#submitOrder").attr('disabled',true);
        }
        refreshCart();
    }

    var products;
    $(function(){
        products = getAllProduct();
        if(products != null){
            //$("#cart").text(products.length);
            refreshCart();
            for(var i=0;i<products.length;i++){
                var product = products[i];

                var html_str = '<div class="row" style="margin:10px 0 0 50px;" id="block_'+product.No+'">'
                    +'<div class="span2"><a href="#">'
                    +'<img style="height: 90px;width: 100px;" class="thumbnail" src="'+product.Pic+'">'
                    +'</a></div><div class="span2" style="margin-left: 10px;"><h4>'+product.Name+'</h4>'
                    +'<a class="reduce" href="javascript:void(0)" onclick="reduceProduct('+product.No+')"> -</a>'
                    +'<input id="'+product.No+'"  type="text" class="input-mini" value="'+product.Quantity+'" style="float: left">'
                    +'<a class="add" href="javascript:void(0)" onclick="addItem('+product.No+')"> +</a>'
                    +'</div><div class="span1" style="padding:22px 0;"><h4 id="total_'+product.No+'">￥：'
                    +product.total+'</h4></div><div class="span2" style="padding:30px 0;">'
                    +'<input type="hidden" id="price_'+product.No+'" value="'+product.Price+'" >'
                    +'<button class="btn danger" onclick="delItem('+product.No+')" id="delete_'+product.No+'">删除</button>'
                    +'<button class="btn primary" onclick="detail('+product.No+')" id="detail_'+product.No+'" style="margin-left:15px">查看</button>'
                    +'</div></div>';

                $("#cart-lists").after(html_str);
            }
        }
    });

    function detail(No){
        window.open("?r=product/view&id="+No+"&fid=<?php echo $_GET['fid']?>");
    }

    $("#submitOrder").live("click",function(){
        products = getAllProduct();
        if(products != null){
//            var totalPrice = 0;
//            for(var i=0;i<products.length;i++){
//                var product = products[i];
//                totalPrice = totalPrice + parseFloat(product.total);
//            }
            window.location.href="?r=product/toOrder&fid=<?php echo $_GET['fid']?>";
<!--            $.ajax({-->
<!--                type:'POST',-->
<!--                dataType:'json',-->
<!--                data:{'products':products,'totalPrice':totalPrice},-->
<!--                url:'?r=order/create',-->
<!--                success:function(json) {-->
<!--                    var result = json.result;-->
<!--                    if(result == "ok"){-->
<!--                        //alert('订单提交成功，可在个人中心-我的订单中查看您的订单');-->
<!--                        //清除所有商品的cookie-->
<!---->
<!--                        //转向订单详情页面-->
<!--                        var orderId = json.orderId;-->
<!--                        window.location.href="?r=product/OrderDetail&id="+orderId;-->
<!--                    }else{-->
<!--                        if(result == 'guest'){-->
<!--                            window.location.href="--><?php //echo Yii::app()->createUrl('user/addresstmp'); ?><!--";-->
<!--                        }else{-->
<!--                            alert('提交出错');-->
<!--                        }-->
<!--                    }-->
<!--                }-->
<!--            });-->
        }
    });

</script>