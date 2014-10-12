<?php
/* @var $this XyAdminsController */
/* @var $model XyAdmins */

//$this->breadcrumbs=array(
//	'Xy Admins'=>array('index'),
//	$model->id,
//);
//
//$this->menu=array(
//	array('label'=>'List XyAdmins', 'url'=>array('index')),
//	array('label'=>'Create XyAdmins', 'url'=>array('create')),
//	array('label'=>'Update XyAdmins', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete XyAdmins', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage XyAdmins', 'url'=>array('admin')),
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
                <a href="?r=xyadmindash/xyadmins/view&id=<?php echo $model->id?>" >
                    个人信息
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/xyadmins/update&id=<?php echo $model->id?>" >
                    维护个人信息
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/xyadmins/changePwd&id=<?php echo $model->id?>"  >
                    修改密码
                </a>
            </li>

            <li>
                <a href="?r=xyadmindash/xyadmins/producttype&id=<?php echo $model->id?>"  >
                    创建商品分类
                </a>
            </li>
            <li>
                <a onclick="change(this)" >
                    仓库管理
                </a>
            </li>
            <?php if($model->role_code == 'super_admin'){?>
                <li>
                    <a href="?r=xyadmindash/university/index&id=<?php echo $model->id?>"  >
                        学校信息管理
                    </a>
                </li>
            <?php }?>


        </ul>

        <br>
        <hr>

    </div>



    <div style="float: right;margin: 10px 300px 0 0px;">

        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                基本信息
            </h1>
        </div>

        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'itemCssClass'=>array('even','odd'),
            'attributes'=>array(
                'username',
                'realname',
                'telephone',
                'orgname',
                'schoolname',
                'role_name',
                'createtime',
                'updatetime',
            ),
        )); ?>
    </div>
</div>
