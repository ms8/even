<?php
/* @var $this UniversityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Universities',
);

$this->menu=array(
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
?>

<h1>Universities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
