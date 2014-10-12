<?php
/* @var $this ProductPicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Pics',
);

$this->menu=array(
	array('label'=>'Create ProductPic', 'url'=>array('create')),
	array('label'=>'Manage ProductPic', 'url'=>array('admin')),
);
?>

<h1>Product Pics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
