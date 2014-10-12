
<?php
/* @var $this DictionaryTypeController */
/* @var $model DictionaryType */

//$this->breadcrumbs=array(
//	'Dictionary Types'=>array('index'),
//	'Manage',
//);
//
//$this->menu=array(
//	array('label'=>'List DictionaryType', 'url'=>array('index')),
//	array('label'=>'Create DictionaryType', 'url'=>array('create')),
//);
//
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#dictionary-type-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>
<div style="margin-top: 70px;">
    <button id="list" onclick="window.location.href='?r=xyadmindash/dictionarytype/index'">字典类型列表</button>
    <button id="list" onclick="window.location.href='?r=xyadmindash/dictionarytype/create'">新建字典类型</button>
</div>
<!--<h1>Manage Dictionary Types</h1>-->

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'dictionary-type-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'type',
        'typename',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
