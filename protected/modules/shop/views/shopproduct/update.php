<?php
/* @var $this ShopproductController */
/* @var $model Shopproduct */

$this->breadcrumbs=array(
	'Shopproducts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shopproduct', 'url'=>array('index')),
	array('label'=>'Create Shopproduct', 'url'=>array('create')),
	array('label'=>'View Shopproduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Shopproduct', 'url'=>array('admin')),
);
?>

<h1>Update Shopproduct <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>