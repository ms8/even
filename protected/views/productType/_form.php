<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_code'); ?>
		<?php echo $form->textField($model,'parent_code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'parent_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_code_value'); ?>
		<?php echo $form->textField($model,'parent_code_value',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'parent_code_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isparent'); ?>
		<?php echo $form->textField($model,'isparent'); ?>
		<?php echo $form->error($model,'isparent'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->