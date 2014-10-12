<?php
/* @var $this ShopproductController */
/* @var $model Shopproduct */

$this->breadcrumbs=array(
	'Shopproducts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Shopproduct', 'url'=>array('index')),
	array('label'=>'Create Shopproduct', 'url'=>array('create')),
	array('label'=>'Update Shopproduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Shopproduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shopproduct', 'url'=>array('admin')),
);
?>

<h1>View Shopproduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'floginname',
		'fshopname',
		'pid',
		'pname',
		'productpic',
		'productprice',
		'pdescripction',
		'typecode',
		'typename',
		'createtime',
	),
)); ?>
