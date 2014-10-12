<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */

$this->breadcrumbs=array(
	'Franchisees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Franchisees', 'url'=>array('index')),
	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
);
?>

<h1>Create Franchisees</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>