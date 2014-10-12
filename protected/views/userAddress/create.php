<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */

$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserAddress', 'url'=>array('index')),
	array('label'=>'Manage UserAddress', 'url'=>array('admin')),
);
?>

<h1>Create UserAddress</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>