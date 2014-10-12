<?php
/* @var $this DictionaryTypeController */
/* @var $model DictionaryType */

$this->breadcrumbs=array(
	'Dictionary Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DictionaryType', 'url'=>array('index')),
	array('label'=>'Create DictionaryType', 'url'=>array('create')),
	array('label'=>'View DictionaryType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DictionaryType', 'url'=>array('admin')),
);
?>

<h1>Update DictionaryType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>