<?php
/* @var $this DictionaryTypeController */
/* @var $model DictionaryType */

//$this->breadcrumbs=array(
//	'Dictionary Types'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List DictionaryType', 'url'=>array('index')),
//	array('label'=>'Manage DictionaryType', 'url'=>array('admin')),
//);
?>

<!--<h1>Create DictionaryType</h1>-->
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
                <a href="?r=xyadmindash/dictionarytype/index"  >
                    字典类型列表
                </a>
            </li>
            <li class="fran_a_active">
                <a href="?r=xyadmindash/dictionarytype/create" >
                    新建字典类型
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/dictionary/index"  >
                    字典列表
                </a>
            </li>
            <li >
                <a href="?r=xyadmindash/dictionary/create" >
                    新建字典
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
                新建字典类型
            </h1>
        </div>

        <div style="margin: 10px 0 10px 0;padding-left: 350px">
            <button id="list" class="btn"
                    onclick="window.location.href='?r=xyadmindash/dictionarytype/index'">字典类型列表</button>
        </div>


        <?php $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>

