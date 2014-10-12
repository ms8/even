<?php
/* @var $this XyAdminsController */
/* @var $model XyAdmins */
/* @var $form CActiveForm */
?>

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
        <li >
            <a href="?r=xyadmindash/xyadmins/view&id=<?php echo $model->id?>" >
                个人信息
            </a>
        </li>
        <li class="fran_a_active">
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
            <a onclick="change(this)" name="passwordChange" >
                创建商品分类
            </a>
        </li>
        <li>
            <a onclick="change(this)" name="passwordChange">
                货物上架管理
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
            维护个人信息
        </h1>
    </div>


    <form class="form-horizontal" style="margin:30px 0 0 0px;text-align: center" method="post"
          action="?r=xyadmindash/xyAdmins/update&id=<?php echo $model->id?>" id="mainform">
        <fieldset >

            <div class="control-group">
                <label class="control-label" for="input01">真实姓名</label>
                <div class="controls">
                    <input type="text" placeholder="真实姓名" class="input-xlarge"
                           name="XyAdmins[realname]" value="<?php echo $model->realname?>">
                </div>
            </div>

            <div class="control-group">
                <!-- Text input-->
                <label class="control-label" for="input01">手机号码</label>
                <div class="controls">
                    <input type="text" placeholder="手机号码" class="input-xlarge"
                           name="XyAdmins[telephone]" value="<?php echo $model->telephone?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input01">学校名称</label>
                <div class="controls">
                    <input type="text" placeholder="学校名称" class="input-xlarge"
                           name="XyAdmins[orgname]" value="<?php echo $model->orgname?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input01">学院名称</label>
                <div class="controls">
                    <input type="text" placeholder="学院名称" class="input-xlarge"
                           name="XyAdmins[schoolname]" value="<?php echo $model->schoolname?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <button id="updateAdmin" class="btn btn-primary" >更新信息</button>
                </div>
            </div>

        </fieldset>
    </form>

</div>