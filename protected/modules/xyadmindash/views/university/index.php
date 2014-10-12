<?php
/* @var $this UniversityController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Universities',
//);
//
//$this->menu=array(
//	array('label'=>'Create University', 'url'=>array('create')),
//	array('label'=>'Manage University', 'url'=>array('admin')),
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
            <li class="fran_a_active">
                <a href="?r=xyadmindash/university/index"  >
                    学校列表
                </a>
            </li>
            <li >
                <a href="?r=xyadmindash/university/create" >
                    新建学校
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/service/index"  >
                    服务区列表
                </a>
            </li>
            <li >
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
                学校列表
            </h1>
        </div>

        <?php
        //        $this->widget('zii.widgets.CListView', array(
        //            'dataProvider'=>$dataProvider,
        //            'itemView'=>'_view',
        //        ));
        ?>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'university-grid',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
                'id',
                'code',
                'name',
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
        ));
        ?>

    </div>
</div>
