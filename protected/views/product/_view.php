<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<!--<div class="view">-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('id')); ?><!--</b>-->
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--	<br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('name')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->name); ?>
<!--    <br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('price')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->price); ?>
<!--	<br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('numbers')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->numbers); ?>
<!--	<br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('description')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->description); ?>
<!--	<br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('main_type')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->main_type); ?>
<!--	<br />-->

<!--	<b>--><?php ////echo CHtml::encode($data->getAttributeLabel('main_type_name')); ?><!--</b>-->
	<?php //echo CHtml::encode($data->main_type_name); ?>
<!--	<br />-->

    <div class="module span3" >
        <a href="?r=product/view&id=3" class="indexpic">
            <img class="thumbnail" alt="Placeholder" src="upload/food/favicon.png">
        </a>
        <div style="margin:12px 0 35px 0;width: 180px;">
            <a href="?r=product/view&amp;id=3">薯片</a>&nbsp;&nbsp;&nbsp;&nbsp;价格￥：8
            <img style="float:right;margin-top:-5px;cursor:pointer;" alt="购物车"
                 onclick="addItem(3,'薯片',8,'upload/food/favicon.png')" src="upload/cart.png">
        </div>
    </div>

<!--</div>-->