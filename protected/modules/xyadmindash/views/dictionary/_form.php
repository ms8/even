<?php
/* @var $this DictionaryController */
/* @var $model Dictionary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dictionary-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('style'=>'margin-top:0px;'),

)); ?>
<!--    <input id="Dictionary_type" type="hidden" name="Dictionary[type]" maxlength="10" size="10">-->
    <input id="Dictionary_typename" type="hidden" name="Dictionary[typename]" maxlength="100" size="60">



	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'type',array('class'=>'inline')); ?>
        <?php echo $form->dropDownList($model,'type',
            $types,
            array('separator'=>'&nbsp;'));
        ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <div class="row buttons">
        <input class="btn" type="submit" value="提交"  id="createBt">
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $(function(){
        $("#createBt").live("click",function(){
            //var typecode = $("#Dictionary_type  option:selected").val();
            var typename = $("#Dictionary_type  option:selected").text();
            //$("#Dictionary_type").val(parentcode);
            $("#Dictionary_typename").val(typename);
        });
    });
</script>