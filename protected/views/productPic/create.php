<?php
/* @var $this ProductPicController */
/* @var $model ProductPic */

$this->breadcrumbs=array(
	'Product Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductPic', 'url'=>array('index')),
	array('label'=>'Manage ProductPic', 'url'=>array('admin')),
);
?>

<h1>Create ProductPic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>