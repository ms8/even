<?php
/* @var $this ProductTypeController */
/* @var $data ProductType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_code')); ?>:</b>
	<?php echo CHtml::encode($data->parent_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_code_value')); ?>:</b>
	<?php echo CHtml::encode($data->parent_code_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isparent')); ?>:</b>
    <?php if($data->isparent == "1")
                echo '是';
           else echo '否';?>

	<br />


</div>