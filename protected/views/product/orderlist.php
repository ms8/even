<?php
/* @var $this ProductController */
/* @var $model Product */

?>

<!-- Start right Sidebar  -->
<div class="row">
    <?php $this->renderPartial('producttype',array('topTypeArr'=>$topTypeArr,'topType'=>$topType)); ?>

    <div class="span8" >

        <h2 style="margin-top: 50px;">您的订单详情如下：</h2>
<!--        <h3>商品信息：</h3>-->
<!--        <hr>-->
        <?php
        $totalNum = 0;
        foreach($orderlist as $product){
            $totalNum = $totalNum + $product->quantity;
        ?>
            <div class="row" style="margin:0 0 0 10px;" >
                <div style="width: 100px;float: left;">
                    <a href="#">
                  <img style="height: 90px;width: 100px;" class="thumbnail" src="<?php echo $product->pic?>">
                    </a>
                </div>
                <div class="span2" style="margin-left: 30px;padding:22px 0;"><h4 style="color: #BB1E4A">
                        <?php echo $product->name?></h4>
                </div>
                <div style="width: 100px;float: left;padding:22px 0;" style="padding:22px 0;"><h4 >单价：<?php echo $product->price?>￥</h4>
                </div>
                <div class="span1" style="padding:22px 0;"><h4 >数量：<?php echo $product->quantity?></h4>
                </div>
                <div class="span2" style="padding:22px 25px;"><h4 >总计：<?php echo $product->totalprice?>￥</h4>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
        <div class="row" style="margin:0 0 0 10px;" >
            <div style="width: 110px;float: left;margin:0 0 0 -10px;"><h4 >订单总计：</h4>
            </div>
            <div class="span2" style="margin-left: 30px;padding:22px 0;">
            </div>
            <div style="width: 100px;float: left;padding:22px 0;" style="padding:22px 0;"></div>
            <div class="span1" ><h4 >总量：<?php echo $totalNum?></h4>
            </div>
            <div class="span2" style="padding:0 15px 0 25px;"><h4 >总额：<?php echo $order->totalprice?>￥</h4>
            </div>
        </div>
        <h3>送货信息：</h3>
        <div class="wrap">
                <fieldset>
                    <div class="control-group">
                            姓名：<?php echo $order->customername?>
                    </div>

                    <div class="control-group">
                            手机：<?php echo $order->telephone?>
                    </div>

                    <div class="control-group">
                            送货地址：<?php echo $order->address?>
                    </div>

                </fieldset>
        </div>
    </div>

</div>
<!-- </div>
</div> -->

<!-- End right Sidebar  -->

<input id="kucun" type="hidden" value="20">

</div>
