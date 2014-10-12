<?php
/* @var $this FranchiseesController */
/* @var $model Franchisees */

//$this->breadcrumbs=array(
//	'Franchisees'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List Franchisees', 'url'=>array('index')),
//	array('label'=>'Manage Franchisees', 'url'=>array('admin')),
//);
?>

<!--<h1>Create Franchisees</h1>-->
<!---->
<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<form class="form-horizontal" style="margin:70px 0 0 400px;" method="post"
    enctype="multipart/form-data" action="?r=shop/Franchisees/create" id="franform">
    <fieldset >

        <div class="control-group">
            <label class="control-label" >登录名称</label>
            <div class="controls">
                <input type="text" placeholder="登录邮箱" class="input-xlarge" name="Franchisees[loginname]">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >登录密码</label>
            <div class="controls">
                <input type="password" id="password1" placeholder="登录密码" class="input-xlarge" name="Franchisees[password]">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >确认密码</label>
            <div class="controls">
                <input type="password" placeholder="确认密码" id="password2" class="input-xlarge" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" >手机号码</label>
            <div class="controls">
                <input type="text" placeholder="手机号码" class="input-xlarge" name="Franchisees[phone]">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" >店铺名称</label>
            <div class="controls">
                <input type="text" placeholder="中文或英文名称" class="input-xlarge" name="Franchisees[shopname]">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" >身份证号码</label>
            <div class="controls">
                <input type="text" placeholder="申请人的身份证号码" class="input-xlarge" name="Franchisees[idcard]">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">身份证照片</label>
            <div class="controls">
                <input class="input-file" id="fileInput" type="file" name="idcard_pic">
            </div>
        </div>

        <div class="control-group">
            <input type="hidden" name="Franchisees[university]" id="university_name" value="">
            <input type="hidden" name="Franchisees[universirycode]" id="university_code" value="">
            <!-- Select Basic -->
            <label class="control-label">所在学校</label>
            <div class="controls">
                <select class="input-xlarge" id="university">
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">你的名字</label>
            <div class="controls">
                <input type="text" placeholder="请填写您的真实姓名" class="input-xlarge" name="Franchisees[studentname]">
            </div>
        </div>

        <div class="control-group">
            <input type="hidden" name="Franchisees[serviceaddress]" id="service_address" value="">
            <input type="hidden" name="Franchisees[servicecode]" id="service_code" value="">
            <!-- Select Basic -->
            <label class="control-label">所在宿舍楼</label>
            <div class="controls">
                <select class="input-xlarge" id="service_zone">
                </select>
            </div>

        </div>

        <div class="control-group">
            <div class="controls" style="margin-left:310px;">
                <button id="createFran" class="btn btn-primary" >提交申请</button>
            </div>
        </div>

    </fieldset>
</form>

<script>
    //创建商品
    $("#createFran").live("click",function(){
        var p1 = $("#password1").val();
        var p2 = $("#password2").val();
        if(p1 != p2){
            alert('两次输入的密码不一致');
            alert('p1:'+p1+",p2:"+p2);
            return;
        }

        var university_code = $("#university  option:selected").val();
        var university_name = $("#university  option:selected").text();
        var service_zone = $("#service_zone  option:selected").val();
        var service_address = $("#service_zone  option:selected").text();
        $("#university_name").val(university_name);
        $("#university_code").val(university_code);
        $("#service_code").val(service_zone);
        $("#service_address").val(service_address);
        $("#franform").submit();
    });

    function getService(uid){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'uid':uid},
            url:'?r=shop/franchisees/getservices',
            success:function(data) {
                var i=0, length=data.length, service;
                for(; i<length; i++) {
                    service = data[i];
                    $("#service_zone").append("<option value='"+service.id+"'>"+service.name+"</option>");
                }
            }
        });
    }



    $(document).ready(new function() {
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'?r=shop/franchisees/getuniversity',
            success:function(data) {
                var i=0, length=data.length, university;
                for(; i<length; i++) {
                    university = data[i];
                    $("#university").append("<option value='"+university.id+"'>"+university.name+"</option>");
                }
                var university_code = $("#university  option:selected").val();
                getService(university_code);
            }
        });

        $("#university").change(function(){
            $("#service_zone").empty();
            var university_code = $("#university  option:selected").val();
            getService(university_code);
        });
    });

</script>