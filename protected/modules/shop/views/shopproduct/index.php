<?php
/* @var $this ShopproductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shopproducts',
);

$this->menu=array(
	array('label'=>'Create Shopproduct', 'url'=>array('create')),
	array('label'=>'Manage Shopproduct', 'url'=>array('admin')),
);
?>

<h1>Shopproducts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
