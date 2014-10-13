<?php
/* @var $this OrderInfoController */
/* @var $model OrderInfo */

$this->breadcrumbs=array(
	'Order Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderInfo', 'url'=>array('index')),
	array('label'=>'Manage OrderInfo', 'url'=>array('admin')),
);
?>

<h1>Create OrderInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>