<?php
/* @var $this FranchiseesController */
/* @var $data Franchisees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loginname')); ?>:</b>
	<?php echo CHtml::encode($data->loginname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shopname')); ?>:</b>
	<?php echo CHtml::encode($data->shopname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logopic')); ?>:</b>
	<?php echo CHtml::encode($data->logopic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcard')); ?>:</b>
	<?php echo CHtml::encode($data->idcard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentid')); ?>:</b>
	<?php echo CHtml::encode($data->studentid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idcardpic')); ?>:</b>
	<?php echo CHtml::encode($data->idcardpic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentpic')); ?>:</b>
	<?php echo CHtml::encode($data->studentpic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university')); ?>:</b>
	<?php echo CHtml::encode($data->university); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('universirycode')); ?>:</b>
	<?php echo CHtml::encode($data->universirycode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentname')); ?>:</b>
	<?php echo CHtml::encode($data->studentname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicecode')); ?>:</b>
	<?php echo CHtml::encode($data->servicecode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serviceaddress')); ?>:</b>
	<?php echo CHtml::encode($data->serviceaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dormitory')); ?>:</b>
	<?php echo CHtml::encode($data->dormitory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	*/ ?>

</div>