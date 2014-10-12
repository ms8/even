<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */
/* @var $form CActiveForm */
?>

<div class="span3"  style="margin-top:30px;margin-left:-20px;float:left;">

    <div class="account-container">

        <div class="account-avatar">
            <img src="" alt="" class="thumbnail">
        </div> <!-- /account-avatar -->

        <div class="account-details">
            <span class="account-name">Rod Howard</span>
            <span class="account-role">Administrator</span>
						<span class="account-actions">
							<a href="javascript:;">Profile</a> |
							<a href="javascript:;">Edit Settings</a>
						</span>
        </div> <!-- /account-details -->
    </div>
    <hr>
    <ul class="nav nav-tabs nav-stacked">
        <li >
            <a href="?r=shop/franchisees/view&id=<?php echo $model->id?>" name="infoChange">
                个人信息
            </a>
        </li>
        <li class="fran_a_active">
            <a href="?r=shop/franchisees/update&id=<?php echo $model->id?>" name="passwordChange">
                维护个人信息
            </a>
        </li>
        <li>
            <a href="?r=shop/franchisees/changePwd&id=<?php echo $model->id?>" name="passwordChange">
                修改密码
            </a>
        </li>

<!--        <li>-->
<!--            <a onclick="change(this)" name="passwordChange" >-->
<!--                店铺信息维护-->
<!--            </a>-->
<!--        </li>-->
        <li>
            <a onclick="change(this)" name="passwordChange">
                货物上架管理
            </a>
        </li>
        <li>
            <a onclick="change(this)" name="passwordChange">
                销售管理
            </a>
        </li>

    </ul>

    <br>
    <hr>

</div>

<div style="float: right;margin: 10px 0 0 100px;">

    <div style="margin:40px 0 0 0;width:450px;">
        <h1 id="page_title" class="page-title">
            维护个人信息
        </h1>
    </div>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'franchisees-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

<!--        <p class="note">Fields with <span class="required">*</span> are required.</p>-->

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

</div>