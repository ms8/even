<?php
/* @var $this OrderInfoController */

$this->breadcrumbs=array(
	'Order Info',
);
?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
