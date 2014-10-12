<?php
/* @var $this ProductPicController */
/* @var $model ProductPic */

$this->breadcrumbs=array(
	'Product Pics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductPic', 'url'=>array('index')),
	array('label'=>'Create ProductPic', 'url'=>array('create')),
	array('label'=>'Update ProductPic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductPic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductPic', 'url'=>array('admin')),
);
?>

<h1>View ProductPic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'productid',
		'pic',
		'createtime',
	),
)); ?>
