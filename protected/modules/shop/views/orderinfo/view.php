<?php
/* @var $this OrderInfoController */
/* @var $model OrderInfo */

$this->breadcrumbs=array(
	'Order Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderInfo', 'url'=>array('index')),
	array('label'=>'Create OrderInfo', 'url'=>array('create')),
	array('label'=>'Update OrderInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderInfo', 'url'=>array('admin')),
);
?>

<h1>View OrderInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fid',
		'customername',
		'username',
		'telephone',
		'address',
		'totalprice',
		'status',
		'append',
		'recievetime',
		'createtime',
		'updatetime',
	),
)); ?>
