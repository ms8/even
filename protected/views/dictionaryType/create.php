<?php
/* @var $this DictionaryTypeController */
/* @var $model DictionaryType */

$this->breadcrumbs=array(
	'Dictionary Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DictionaryType', 'url'=>array('index')),
	array('label'=>'Manage DictionaryType', 'url'=>array('admin')),
);
?>

<h1>Create DictionaryType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>