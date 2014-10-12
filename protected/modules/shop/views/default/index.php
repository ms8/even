<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.jui.CJuiButton', array(
    'buttonType'=>'link',
    'name'=>'btnGo',
    'caption'=>'申请加入',
//'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
    'url'=>array('Franchisees/create'),
)); ?>