<?php
/* @var $this ServiceController */
/* @var $model Service */

//$this->breadcrumbs=array(
//	'Services'=>array('index'),
//	$model->name=>array('view','id'=>$model->id),
//	'Update',
//);
//
//$this->menu=array(
//	array('label'=>'List Service', 'url'=>array('index')),
//	array('label'=>'Create Service', 'url'=>array('create')),
//	array('label'=>'View Service', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Service', 'url'=>array('admin')),
//);
?>

<div class="row" style="margin:50px 0 100px -20px;">

    <div class="span3"  style="margin:30px 0 0 180px;float:left;">

        <div class="account-container">

            <div class="account-avatar">
                <img src="" alt="" class="thumbnail">
            </div> <!-- /account-avatar -->

            <div class="account-details">
                <span class="account-name">Rod Howard</span>
                <span class="account-role">Administrator</span>
                <span class="account-actions">
                    <a href="javascript:;">Profile</a> |
                    <a href="javascript:;">Edit Settings</a>
                </span>
            </div> <!-- /account-details -->
        </div>
        <hr>
        <ul class="nav nav-tabs nav-stacked">
            <li>
                <a href="?r=xyadmindash/university/index"  >
                    学校列表
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/university/create" >
                    新建学校
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/service/index"  >
                    服务区列表
                </a>
            </li>
            <li class="fran_a_active">
                <a href="?r=xyadmindash/service/create" >
                    新建服务区
                </a>
            </li>
            <li >
                <a href="?r=xyadmindash/xyadmins/view&id=<?php echo $userid ?>" >
                    基本信息管理
                </a>
            </li>

        </ul>

        <br>
        <hr>

    </div>



    <div style="float: right;margin: 10px 350px 0 0px;">

        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                更新服务区信息
            </h1>
        </div>

        <div style="margin: 10px 0 10px 0;padding-left: 200px">
            <button id="list" class="btn"
                    onclick="window.location.href='?r=xyadmindash/service/index'">服务区列表</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button id="create" class="btn"
                    onclick="window.location.href='?r=xyadmindash/service/create'">新建服务区</button>
        </div>

        <?php $this->renderPartial('_form', array('model'=>$model,'universitys'=>$universitys)); ?>

    </div>
</div>