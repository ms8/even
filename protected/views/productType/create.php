<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */


$this->breadcrumbs=array(
	'Product Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductType', 'url'=>array('index')),
	array('label'=>'Manage ProductType', 'url'=>array('admin')),
);
?>



<div id="parentcode-zone" style="margin-top:50px;">
    <h1>选择父类型</h1>
    <select name="parentcode" id="parentcode" >
        <?php
        foreach($producttypes as $type){
        ?>
            <option value="<?php echo $type->code?>"><?php echo $type->value?></option>
        <?php
        }
        ?>

    </select>
</div>


    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'product-type-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>

        <?php echo $form->errorSummary($model); ?>
        <input id="ProductType_parent_code"
               type="hidden" name="ProductType[parent_code]" >
        <input id="ProductType_parent_value"
               type="hidden" name="ProductType[parent_code_value]" maxlength="10" size="10">

        <div class="row ">
            <?php echo $form->labelEx($model,'类别代码'); ?>
            <?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'code'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'类别名称'); ?>
            <?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'value'); ?>
        </div>


        <div class="row">
            <input id="ProductType_isparent" type="hidden" name="ProductType[isparent]">
<!--            --><?php //echo $form->labelEx($model,'isparent'); ?>
<!--            --><?php //echo $form->textField($model,'isparent'); ?>
<!--            --><?php //echo $form->error($model,'isparent'); ?>
            <h3>是否作为父类别：</h3>
            <label class="radio inline">
                <input type="radio" name="isparent" value="1"> 是
            </label>
            <label class="radio inline">
                <input type="radio" name="isparent" value="0" checked> 否
            </label>
        </div>

        <div class="row buttons">
            <input type="submit" value="新建"  id="createBt">
        </div>

        <?php $this->endWidget(); ?>

    </div>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<script>
    $(function(){
        $("#createBt").live("click",function(){
            var isparent = $('input[name="isparent"]:checked').val();
            $("#ProductType_isparent").val(isparent);
            var parentcode = $("#parentcode  option:selected").val();
            var parentvalue = $("#parentcode  option:selected").text();
            $("#ProductType_parent_code").val(parentcode);
            $("#ProductType_parent_value").val(parentvalue);
        });
    });
</script>