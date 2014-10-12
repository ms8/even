<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */

$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserAddress', 'url'=>array('index')),
	array('label'=>'Create UserAddress', 'url'=>array('create')),
	array('label'=>'View UserAddress', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserAddress', 'url'=>array('admin')),
);
?>

<h1>Update UserAddress <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>