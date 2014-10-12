<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */

//$this->breadcrumbs=array(
//	'Franchisees'=>array('index'),
//	$model->id,
//);
//
//$this->menu=array(
//	array('label'=>'List Franchisees', 'url'=>array('index')),
//	array('label'=>'Create Franchisees', 'url'=>array('create')),
//	array('label'=>'Update Franchisees', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Franchisees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
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
                <a href="?r=shop/franchisees/view&id=<?php echo $model->id?>" name="infoChange">
                    个人信息
                </a>
            </li>
            <li>
                <a href="?r=shop/franchisees/update&id=<?php echo $model->id?>" >
                    维护个人信息
                </a>
            </li>
            <li>
                <a href="?r=shop/franchisees/changePwd&id=<?php echo $model->id?>" >
                    修改密码
                </a>
            </li>

<!--            <li>-->
<!--                <a onclick="change(this)" name="passwordChange" >-->
<!--                    店铺信息维护-->
<!--                </a>-->
<!--            </li>-->
            <li>
                <a href="?r=shop/franchisees/tofran&id=<?php echo $model->id?>">
                    货物上架管理
                </a>
            </li>
            <li >
                <a href="?r=shop/franchisees/snap&id=<?php echo $model->id?>">
                    货架管理
                </a>
            </li>
            <li>
                <a onclick="change(this)" name="passwordChange">
                    销售管理
                </a>
            </li>

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
            'id',
            'loginname',
            'shopname',
            'logopic',
                'idcard',
            'studentid',
            'idcardpic',
            'studentpic',
            'university',
            'studentname',
            'serviceaddress',
            'dormitory',
            'status',
            'createtime',
            'updatetime',
        ),
    )); ?>
    </div>

</div>
