<?php
/* @var $this OrderInfoController */
/* @var $data OrderInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data['id']); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['id']), array('view', 'id'=>$data['id'])); ?>
	<br />

	<b><?php echo CHtml::encode($data['fid']); ?>:</b>
	<?php echo CHtml::encode($data['fid']); ?>
	<br />

	<b><?php echo CHtml::encode($data['customername']); ?>:</b>
	<?php echo CHtml::encode($data['customername']); ?>
	<br />

	<b><?php echo CHtml::encode($data['username']); ?>:</b>
	<?php echo CHtml::encode($data['username']); ?>
	<br />

	<b><?php echo CHtml::encode($data['telephone']); ?>:</b>
	<?php echo CHtml::encode($data['telephone']); ?>
	<br />

	<b><?php echo CHtml::encode($data['address']); ?>:</b>
	<?php echo CHtml::encode($data['address']); ?>
	<br />

	<b><?php echo CHtml::encode($data['totalprice']); ?>:</b>
	<?php echo CHtml::encode($data['totalprice']); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('append')); ?>:</b>
	<?php echo CHtml::encode($data->append); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recievetime')); ?>:</b>
	<?php echo CHtml::encode($data->recievetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	*/ ?>

</div>