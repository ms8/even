<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */

$this->breadcrumbs=array(
	'Franchisees'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Franchisees', 'url'=>array('index')),
	array('label'=>'Create Franchisees', 'url'=>array('create')),
	array('label'=>'Update Franchisees', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Franchisees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
);
?>

<h1>View Franchisees #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'loginname',
		'password',
		'shopname',
		'logopic',
		'idcard',
		'studentid',
		'idcardpic',
		'studentpic',
		'university',
		'universirycode',
		'studentname',
		'servicecode',
		'serviceaddress',
		'dormitory',
		'status',
		'createtime',
		'updatetime',
	),
)); ?>
