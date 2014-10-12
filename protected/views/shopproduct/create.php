<?php
/* @var $this ShopproductController */
/* @var $model Shopproduct */

$this->breadcrumbs=array(
	'Shopproducts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shopproduct', 'url'=>array('index')),
	array('label'=>'Manage Shopproduct', 'url'=>array('admin')),
);
?>

<h1>Create Shopproduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>