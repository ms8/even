<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);

//$this->menu=array(
//	array('label'=>'Create Product', 'url'=>array('create')),
//	array('label'=>'Manage Product', 'url'=>array('admin')),
//);
?>

<div style="margin-top: 100px;">

    <div class="span3" style="margin-top: -65px">
        <div class="sidebar-nav">
            <div style="margin-top: 50px;" class="base">
                <ul class="nav nav-list">

                    <li class="active">
                        <a href="http://wbpreview.com/previews/WB03K48SB/#">
                            <div data-icon="" aria-hidden="true" class="fs1"></div>
                            休闲美食
                        </a>
                    </li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">薯片</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">饼干</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">瓜子飘香</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">泡面</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">美味饮品</a></li>
                    <li class="divider"></li>
                </ul>

                <ul class="nav nav-list">
                    <li class="active">
                        <a href="http://wbpreview.com/previews/WB03K48SB/#">
                            <div data-icon="" aria-hidden="true" class="fs1"></div>
                            生活必备
                        </a>
                    </li><li>
                        <a href="http://wbpreview.com/previews/WB03K48SB/#">
                            干燥剂
                        </a>
                    </li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">暖宝贴</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">牙膏牙刷</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">面膜</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">围巾</a></li>
                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">腰带</a></li>
                    <li class="divider"></li>

                </ul>
            </div>
            <hr>
        </div>
    </div>

    <div class="span8">
        <hr style="width:200px;margin-left:20px">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
//            'summaryCssClass'=>'product-list-title',
            'summaryText'=>'',
            'itemView'=>'_view',
        )); ?>
    </div>

</div>