<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'franchisees-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'loginname'); ?>
		<?php echo $form->textField($model,'loginname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'loginname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shopname'); ?>
		<?php echo $form->textField($model,'shopname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'shopname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logopic'); ?>
		<?php echo $form->textField($model,'logopic',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'logopic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcard'); ?>
		<?php echo $form->textField($model,'idcard',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'idcard'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentid'); ?>
		<?php echo $form->textField($model,'studentid',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'studentid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcardpic'); ?>
		<?php echo $form->textField($model,'idcardpic',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'idcardpic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentpic'); ?>
		<?php echo $form->textField($model,'studentpic',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'studentpic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textField($model,'university',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'universirycode'); ?>
		<?php echo $form->textField($model,'universirycode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'universirycode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentname'); ?>
		<?php echo $form->textField($model,'studentname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'studentname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servicecode'); ?>
		<?php echo $form->textField($model,'servicecode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'servicecode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serviceaddress'); ?>
		<?php echo $form->textField($model,'serviceaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'serviceaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dormitory'); ?>
		<?php echo $form->textField($model,'dormitory',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dormitory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createtime'); ?>
		<?php echo $form->textField($model,'createtime'); ?>
		<?php echo $form->error($model,'createtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->