<?php
/* @var $this XyAdminsController */
/* @var $model XyAdmins */

//$this->breadcrumbs=array(
//	'Xy Admins'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);
//
//$this->menu=array(
//	array('label'=>'List XyAdmins', 'url'=>array('index')),
//	array('label'=>'Create XyAdmins', 'url'=>array('create')),
//	array('label'=>'View XyAdmins', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage XyAdmins', 'url'=>array('admin')),
//);
?>

    <div class="row" style="margin:50px 0 100px -20px;">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

     </div>