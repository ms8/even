<?php
/* @var $this ShopproductController */
/* @var $data Shopproduct */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floginname')); ?>:</b>
	<?php echo CHtml::encode($data->floginname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fshopname')); ?>:</b>
	<?php echo CHtml::encode($data->fshopname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::encode($data->pid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pname')); ?>:</b>
	<?php echo CHtml::encode($data->pname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productpic')); ?>:</b>
	<?php echo CHtml::encode($data->productpic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productprice')); ?>:</b>
	<?php echo CHtml::encode($data->productprice); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdescripction')); ?>:</b>
	<?php echo CHtml::encode($data->pdescripction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typecode')); ?>:</b>
	<?php echo CHtml::encode($data->typecode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typename')); ?>:</b>
	<?php echo CHtml::encode($data->typename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	*/ ?>

</div>