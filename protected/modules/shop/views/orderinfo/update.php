<?php
/* @var $this OrderInfoController */
/* @var $model OrderInfo */

$this->breadcrumbs=array(
	'Order Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderInfo', 'url'=>array('index')),
	array('label'=>'Create OrderInfo', 'url'=>array('create')),
	array('label'=>'View OrderInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderInfo', 'url'=>array('admin')),
);
?>

<h1>Update OrderInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>