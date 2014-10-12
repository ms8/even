<?php
/* @var $this ProductPicController */
/* @var $model ProductPic */

$this->breadcrumbs=array(
	'Product Pics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductPic', 'url'=>array('index')),
	array('label'=>'Create ProductPic', 'url'=>array('create')),
	array('label'=>'View ProductPic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductPic', 'url'=>array('admin')),
);
?>

<h1>Update ProductPic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>