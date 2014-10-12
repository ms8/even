<?php
/* @var $this DictionaryTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dictionary Types',
);

$this->menu=array(
	array('label'=>'Create DictionaryType', 'url'=>array('create')),
	array('label'=>'Manage DictionaryType', 'url'=>array('admin')),
);
?>

<h1>Dictionary Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
