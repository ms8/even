<?php
/* @var $this ShopproductController */
/* @var $model Shopproduct */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shopproduct-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'floginname'); ?>
		<?php echo $form->textField($model,'floginname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'floginname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fshopname'); ?>
		<?php echo $form->textField($model,'fshopname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fshopname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->textField($model,'pid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pname'); ?>
		<?php echo $form->textField($model,'pname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productpic'); ?>
		<?php echo $form->textField($model,'productpic',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'productpic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productprice'); ?>
		<?php echo $form->textField($model,'productprice'); ?>
		<?php echo $form->error($model,'productprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdescripction'); ?>
		<?php echo $form->textField($model,'pdescripction',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'pdescripction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typecode'); ?>
		<?php echo $form->textField($model,'typecode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'typecode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typename'); ?>
		<?php echo $form->textField($model,'typename',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'typename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createtime'); ?>
		<?php echo $form->textField($model,'createtime'); ?>
		<?php echo $form->error($model,'createtime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->