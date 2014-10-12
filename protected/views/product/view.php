<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

?>

<!-- Start right Sidebar  -->
<div class="row">

    <?php $this->renderPartial('producttype',array('topTypeArr'=>$topTypeArr,'topType'=>$topType)); ?>

    <div class="span8" >

        <div class="row">
            <div class="span4" style="margin-top:10px">
                <div class="row" style="margin-bottom:10px">
                    <div class="span5 portfolio-large" style="height: 280px;width: 280px;">
                        <img id="mainPic" src="<?php echo $model->pic?>" alt="Placeholder" class="thumbnail">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="span2 portfolio-thumb-small" style="height: 80px;width: 80px;margin-left: 20px">
                        <a href="#">
                            <img src="<?php echo $model->pic?>" alt="Placeholder" class="thumbnail"></a>
                    </div>
                    <?php foreach($product_pic as $pp){
                    ?>
                        <div class="span2 portfolio-thumb-small" style="height: 80px;width: 80px;margin-left: 20px">
                            <a href="#">
                                <img src="<?php echo $pp->pic?>" alt="Placeholder" class="thumbnail"></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class=" project-info" style="margin-left:350px;margin-top:30px;">
                <h2 id="name"><?php echo $model->name?></h2>
<!--                <div class="old-price">原价￥：<span id="old-price">10</span></div>-->
                <div class="new-price"> 价格￥：<span id="price"> <?php echo $model->price?> </span></div>
                <div >
                    <br><br>
                    <div id="description">
                        <?php echo $model->description?>
                    </div>
                 </div>

                <div class="well" style="margin-top:25px;height:140px">
                    <div class="control-group">
                        <label class="control-label">购买数量</label>
                        <div class="controls">
                            <a class="reduce" href="javascript:void(0)" onclick="reduce()"> -</a>
                            <input id="quantity"  type="text" class="input-mini" value="1" style="float: left">
                            <a class="add" href="javascript:void(0)" onclick="add()"> +</a>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button class="btn" type="button"
                                    onclick="window.open('?r=product/cart&fid=<?php echo $_GET['fid']?>')"
                                    style="font-size: 15px;float:left;
    font-weight: bold;height: 45px;width: 110px;margin:15px 0 0 0px;background-color: #C51B00">
                                查看购物车
                            </button>
                            <button class="btn" type="button" id="submitBt"
                                    style="font-size: 15px;float:left;
    font-weight: bold;height: 45px;width: 110px;margin:15px 0 0 20px;background-color: #C51B00">
                                加入购物车
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>
<!-- </div>
</div> -->

<!-- End right Sidebar  -->

<input id="kucun" type="hidden" value="20">
<input id="productId" type="hidden" value="1">
<!--<input id="fid" type="hidden" value="--><?php //echo $_GET['fid']?><!--">-->
</div>

<script>
    function reduce(){
        var nr = $("#quantity").val();
        if(nr > 1){
            nr--;
            $("#quantity").val(nr);
        }
    }
    function add(){
        var na = $("#quantity").val();
        var kc = $("#kucun").val();
        kc = parseInt(kc);
        if(na < kc){
            na++;
            $("#quantity").val(na);
        }else{
            alert("这款商品实在是太畅销了，仅剩"+na+"份了，我们将马上进货，给您造成的困扰敬请谅解，谢谢");
        }
    }

    $("#submitBt").click(function(){
       var price = $("#price").text();
       var quantity = $("#quantity").val();
       var name = $("#name").text();
       var id = $("#productId").val();
       var pic = $("#mainPic").attr("src");

       addProduct(id,name,price,pic,quantity);
       refreshCart();
    });

    $("a img").live("mouseover",function(){
        var src = $(this).attr("src");
        $("#mainPic").attr("src",src);
    });

    $("a img").live("click",function(){
        var src = $(this).attr("src");
        $("#mainPic").attr("src",src);
    });

    function loadIndex(){
        $.ajax({
            type:'POST',
            dataType:'json',
            async:false,
            url: '?r=product/typelist',
            success: function(typeArr){
//                var html = '',slider;
//                for(i=0; i<sliderArr.length; i++) {
//                    slider = sliderArr[i];
//                    html += '<li><h1 class="main_title">'+slider.title+'</h1>'
//                        +'<p class="subtitle">'+slider.content+'</p>'
//                        +'<img src="'+slider.pic+'" alt="slider 2" />'
//                        +'</li>';
//                }
//                $('#slidershow_ul').append(html);
            }
        });
    }

    $(document).ready(new function() {
        //loadIndex();
        //alert($("#loginname").val());
    });

//    function window.onbeforeunload(){
//        var id = $("#productId").val();
//        delProduct(id);
//    }

</script>