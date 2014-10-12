<?php
/* @var $this XyAdminsController */
/* @var $model XyAdmins */

//$this->breadcrumbs=array(
//	'Xy Admins'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List XyAdmins', 'url'=>array('index')),
//	array('label'=>'Manage XyAdmins', 'url'=>array('admin')),
//);
?>

<form class="form-horizontal" style="margin:70px 0 0 200px;text-align: center" method="post"
     action="?r=xyadmindash/xyAdmins/create" id="mainform">
    <fieldset >

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">登录名称</label>
            <div class="controls">
                <input type="text" placeholder="登录邮箱" class="input-xlarge" name="XyAdmins[username]">
            </div>
        </div>
        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">登录密码</label>
            <div class="controls">
                <input type="password" id="password1" placeholder="登录密码" class="input-xlarge" name="XyAdmins[password]">
            </div>
        </div>
        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">确认密码</label>
            <div class="controls">
                <input type="password" placeholder="确认密码" id="password2" class="input-xlarge" >
            </div>
        </div>

        <div class="control-group">
            <!-- Text input-->
            <label class="control-label" for="input01">手机号码</label>
            <div class="controls">
                <input type="text" placeholder="手机号码" class="input-xlarge" name="XyAdmins[telephone]">
            </div>
        </div>

        <div class="control-group">
            <input type="hidden" name="XyAdmins[role_name]" id="role_name" value="">
            <input type="hidden" name="XyAdmins[role_code]" id="role_code" value="">
            <!-- Select Basic -->
            <label class="control-label">角色</label>
            <div class="controls">
                <select class="input-xlarge" id="role">
                    <option value="command_admin">普通管理员</option>
                </select>
            </div>

        </div>



        <div class="control-group">
            <label class="control-label"></label>

            <!-- Button -->
            <div class="controls">
                <button id="createAdmin" class="btn btn-primary" >创建管理员</button>
            </div>
        </div>

    </fieldset>
</form>

<script>
    //创建商品
    $("#createAdmin").live("click",function(){
        var p1 = $("#password1").val();
        var p2 = $("#password2").val();
        if(p1 != p2){
            alert('两次输入的密码不一致');
            return;
        }

        var role_code = $("#role  option:selected").val();
        var role_name = $("#role  option:selected").text();

        $("#role_name").val(role_name);
        $("#role_code").val(role_code);
        $("#mainform").submit();
    });
</script>