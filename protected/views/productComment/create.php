<?php
/* @var $this ProductCommentController */
/* @var $model ProductComment */

$this->breadcrumbs=array(
	'Product Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductComment', 'url'=>array('index')),
	array('label'=>'Manage ProductComment', 'url'=>array('admin')),
);
?>

<h1>Create ProductComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>