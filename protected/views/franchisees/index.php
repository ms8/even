<?php
/* @var $this FranchiseesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Franchisees',
);

$this->menu=array(
	array('label'=>'Create Franchisees', 'url'=>array('create')),
	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
);
?>

<h1>Franchisees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
