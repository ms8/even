<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Types',
);

$this->menu=array(
	array('label'=>'Create ProductType', 'url'=>array('create')),
	array('label'=>'Manage ProductType', 'url'=>array('admin')),
);
?>

<h1>Product Types</h1>

<?php //$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php
$dataProvider->pagination->pageSize=20;
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{summary}{items}{pager}',
)); ?>