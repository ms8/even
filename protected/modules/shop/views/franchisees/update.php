<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */

//$this->breadcrumbs=array(
//	'Franchisees'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);
//
//$this->menu=array(
//	array('label'=>'List Franchisees', 'url'=>array('index')),
//	array('label'=>'Create Franchisees', 'url'=>array('create')),
//	array('label'=>'View Franchisees', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
//);
?>

<!--<h1>Update Franchisees --><?php //echo $model->id; ?><!--</h1>-->
    <div class="row" style="margin:50px 0 100px -20px;">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>