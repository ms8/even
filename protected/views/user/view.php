<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Users'=>array('index'),
    $model->id,
);

/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
*/
?>

<div class="container">

<div class="row" style="margin-top:70px;margin-left:-20px">
<?php $arr=array();$this->renderPartial('_tab',array('arr'=>$arr)); ?>

<div class="span9">
    <h1 id="page_title" class="page-title">
        个人信息
    </h1>

    <!-- 个人信息-->
    <div id="infoChange">
        <div class="wrap">
            <form class=" main form-horizontal" onsubmit="return check()" action="main/active">
                <fieldset>
<!--                    <div class="control-group">-->
<!--                        <label class="control-label">昵称</label>-->
<!--                        <div class="controls">-->
<!--                            <input id="nickname" type="text" class="input-large" value="--><?php //echo $model->nickname?><!--">-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="control-group">
                        <label class="control-label">姓名</label>
                        <div class="controls">
                            <input id="realname" value="<?php echo $model->realname?>" type="text"  class="input-large" required placeholder="必填项">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >移动电话</label>
                        <div class="controls">
                            <input id="phone" value="<?php echo $model->telephone?>"type="text" class="input-large" required placeholder="必填项">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">送货地址</label>
                        <div>
                            <table class="table" style="width:450px">
                                <tr>
                                    <td>学校</td><td>宿舍楼</td><td>宿舍号</td>
                                </tr>
                                <tr>
                                    <td id="university"><?php echo $model->university?></td>
                                    <td id="service"><?php echo $model->serviceaddress?></td>
                                    <td>
                                        <input id="dorm" type="text" class="input-mini" value="<?php echo $model->dorm?>">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <button class="btn" type="button" id="person-info" style="font-weight: 800;font-size: 15px;width:150px;height:50px;">提 交</button>
                            <button class="btn" type="reset" style="font-weight: 800;font-size: 15px;width:150px;height:50px;margin-left:40px;">重 置</button>

                        </div>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- 更换头像-->
    <div id="picChange" style="display: none;">
        <div class="demo" style="float: left">
            <div class="files" style="display: none"></div>
            <div style="height: 150px;width: 150px;margin-left:150px ">
                <img id="showimg" src="upload/grava.png">
                <h2 style="background: #69BC87;height: 35px;width: 100px;font-size: 15px;text-align: center;color: #FFFFFF;padding: 3px;margin-top: 15px">当前头像</h2>
            </div>

        </div>

        <div   class="imagePre" data-provides="imagePre" style="float: right;margin-right: 100px;">
            <div class="thumbnail" style="height: 180px;width: 180px;border-radius: 200px 200px 200px 200px;float: left">
                <img style="width: 170px;height: 170px;" class="imagePreview" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
            </div>
            <span id="picOper" class="btn btn-file" style="margin-top:10px;padding: 10px;">
                <span class="imagePre-new">选择新头像</span>
                <span class="imagePre-exists">选择新头像</span>
                <input type="file" name="file" id="fileupload" />
            </span>
            <button id="submitfile" name="mypic" class="btn btn-file">上传</button>
        </div>
    </div>

    <!-- 修改密码-->
    <div id="passwordChange" style="display: none">
        <form class="well">
            <div class="control-group">
                <label class="control-label" for="password1">密码</label>
                <input id="password1" type="password" value="">
            </div>
            <div class="control-group">
                <label class="control-label" for="password2">确认密码</label>
                <input id="password2" type="password" value="12">
            </div>
            <div style="width: 42%;padding: 0 0 0 228px;">
                <button type="button" id="update-password" class="btn" >提交</button>
            </div>

        </form>
    </div>

    <!-- 我的收藏-->
    <div id="myCollection" style="display: none">
        <ul class="thumbnails">
            <li class="span3">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="300x200"  src="images/zw/dllz.jpg" data-pinit="registered">

                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                    <div class="clearfix">
                        <a class="btn btn-tales-one" href="blog-detail.html">Read more</a>
                    </div>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="300x200"  src="images/zw/dllz.jpg" data-pinit="registered">

                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                    <div class="clearfix">
                        <a class="btn btn-tales-one" href="blog-detail.html">Read more</a>
                    </div>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="300x200"  src="images/zw/dllz.jpg" data-pinit="registered">

                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                    <div class="clearfix">
                        <a class="btn btn-tales-one" href="blog-detail.html">Read more</a>
                    </div>
                </div>
            </li>
            <ul>
    </div>

    <div id="parentcode-zone" class="form" style="margin-top:50px;display: none">
        <h1>选择父类型</h1>
        <select name="parentcode" id="parentcode" >
            <option value=""></option>
            <?php
            foreach($producttypes as $type){
                ?>
                <option value="<?php echo $type->code?>"><?php echo $type->value?></option>
            <?php
            }
            ?>

        </select>

        <div class="well" >
            <form id="product-type-form" method="post" action="?r=productType/create">
                <input id="ProductType_parent_code"
                       type="hidden" name="ProductType[parent_code]" >
                <input id="ProductType_parent_value"
                       type="hidden" name="ProductType[parent_code_value]" maxlength="10" size="10">

                <div class="row ">
                    <label for="ProductType_类别代码">类别代码</label>
                    <input id="ProductType_code" type="text" name="ProductType[code]" maxlength="10" size="10">
                </div>

                <div class="row">
                    <label for="ProductType_类别名称">类别名称</label>
                    <input id="ProductType_value" type="text" name="ProductType[value]" maxlength="100" size="60">
                </div>

                <div class="row">
                    <input id="ProductType_isparent" type="hidden" name="ProductType[isparent]">
                    <h3>是否作为父类别：</h3>
                    <label class="radio inline">
                        <input type="radio" name="isparent" value="1"> 是
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="isparent" value="0" checked> 否
                    </label>
                </div>

                <div class="row buttons">
                    <input type="submit" value="新建"  class="btn" id="createBt">
                </div>
            </form>
        </div>
    </div>

    <div class="well form" id="product-info" style="display: none">

        <form enctype="multipart/form-data" method="post" action="?r=User/CreateProduct" id="product-form">
            <input id="Product_main_type"
                   type="hidden" name="Product[main_type]" >
            <input id="Product_main_type_name"
                   type="hidden" name="Product[main_type_name]" >
            <fieldset>
                <div class="control-group">
                    <label class="control-label">名称</label>
                    <div class="controls">
                        <input type="text" id="Product_name" name="Product[name]" maxlength="150" size="60">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">价格</label>
                    <div class="controls">
                        <input type="text" id="Product_price" name="Product[price]">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" >库存</label>
                    <div class="controls">
                        <input type="text" id="Product_numbers" name="Product[numbers]">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" >描述</label>
                    <div class="controls">
                        <input type="text" id="Product_description" name="Product[description]" maxlength="1000" size="60">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" >父类型</label>
                    <select name="parentcode2" id="parentcode2" >
                        <?php
                        foreach($producttypes as $type){
                            ?>
                            <option value="<?php echo $type->code?>"><?php echo $type->value?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="control-group">
                    <label class="control-label" >照片路径</label>
                    <div class="controls">
                        上传文件:
                        <input name="productpic[]" type="file">
                        <input name="productpic[]" type="file">
                        <input name="productpic[]" type="file">
                    </div>
                </div>

                <div class="control-group">
                    <input id="Product_status" name="Product[status]"  type="hidden">
                    <label class="control-label" >是否上架</label>
                    <label class="radio inline">
                        <input type="radio" name="ison" value="1" checked> 是
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="ison" value="0" > 否
                    </label>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input style="margin-left:230px" type="submit" value="新建"  class="btn" id="createproductBt">
                    </div>

                </div>
            </fieldset>
        </form>
    </div>

    <!-- slider_show create -->
    <div class="well form" id="slidershow-info" style="display: none">
        <form enctype="multipart/form-data" method="post" action="?r=User/CreateSlider" id="Slider-form">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">标题</label>
                    <div class="controls">
                        <input type="text" id="Slider_title" name="SliderShow[title]" maxlength="150" size="60">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">内容</label>
                    <div class="controls">
                        <textarea type="text" id="Slider_content" name="SliderShow[content]">
                        </textarea>
                    </div>
                </div>

                <div class="control-group">
                    <input id="Slider_status" name="SliderShow[status]"  type="hidden">
                    <label class="control-label" >是否启用</label>
                    <label class="radio inline">
                        <input type="radio" name="sd_ison" value="1" checked> 是
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="sd_ison" value="0" > 否
                    </label>
                </div>

                <div class="control-group">
                    <label class="control-label" >序号</label>
                    <div class="controls">
                        <input type="text" id="Slider_sort" name="SliderShow[sort]">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" >照片路径</label>
                    <div class="controls">
                        上传文件:
                        <input name="sd_pic" type="file">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input style="margin-left:230px" type="submit" value="新建"  class="btn" id="sd_createBt">
                    </div>

                </div>
            </fieldset>
        </form>
    </div>

</div> <!-- /span9 -->


</div> <!-- /row -->

</div> <!-- /container -->

<input type="hidden" id="userid" value="<?php echo Yii::app()->user->id?>">

<script type="text/javascript">
    $(document).ready(function() {
        $("#picChange").hide();
        $("#passwordChange").hide();
        $("#myCollection").hide();
        $("#password1").val("");
        $("#password2").val("");

        $('div.imagePre').imagePre({'name':'sampleImage'});
        //name 为文件输入的字段的名称, checkboxName即是否删除图片的字段名称
    });

    function change(obj){
        $("#picChange").hide();
        $("#passwordChange").hide();
        $("#infoChange").hide();
        $("#myCollection").hide();
        $("#parentcode-zone").hide();
        $("#product-info").hide();
        $("#slidershow-info").hide();
        $("#infoChange").removeAttr("class");
        $("#picChange").removeAttr("class");
        $("#passwordChange").removeAttr("class");
        $("#myCollection").removeAttr("class");
        $("#parentcode-zone").removeAttr("class");
        $("#product-info").removeAttr("class");
        $("#slidershow-info").removeAttr("class");

        $("#"+$(obj).attr("name")).show();
        $(obj).parent().siblings().each(function(){
            $(this).removeAttr("class");
        });
        $(obj).parent().attr("class", "active");
        $("#page_title").text($(obj).text());
    }
</script>

<script type="text/javascript">
    $("#update-password").live('click',function(){
        var p2 = $('#password2').val();
        var p1 = $('#password1').val();
        if( p2 != p1 ){
            alert('两次填写密码不一致，请重新填写：）');
        }else{
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'password':p1},
                url:'?r=user/changepwd',
                success:function(json) {
                    if(json.result != ""){
                        alert('修改成功');
                    }
                }
            });
        }
    });


    $("#sd_createBt").live("click",function(){
        var is_on = $('input[name="sd_ison"]:checked').val();
        $("#Slider_status").val(is_on);

    });

    $("#createBt").live("click",function(){
        var isparent = $('input[name="isparent"]:checked').val();
        $("#ProductType_isparent").val(isparent);
        var parentcode = $("#parentcode  option:selected").val();
        var parentvalue = $("#parentcode  option:selected").text();
        $("#ProductType_parent_code").val(parentcode);
        $("#ProductType_parent_value").val(parentvalue);
    });

    //创建商品
    $("#createproductBt").live("click",function(){
        var ison = $('input[name="ison"]:checked').val();
        $("#Product_status").val(ison);
        var parentcode = $("#parentcode2  option:selected").val();
        var parentvalue = $("#parentcode2  option:selected").text();
        $("#Product_main_type").val(parentcode);
        $("#Product_main_type_name").val(parentvalue);
    });

    $("#person-info").live('click',function(){
        //var nickname = $("#nickname").val();
        var realname = $("#realname").val();
        var phone = $("#phone").val();
        var dorm = $("#dorm").val();
        //var address = $("#address").val();
        //var introduction = $("#introduction").text();
        //var sex = $('input[name="sex"]:checked').val();

        var userid = $("#userid").val();

        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'realname':realname,'phone':phone,'dorm':dorm},
            url:'?r=user/update&id='+userid,
            success:function(json) {
                var result = json.result;
               // alert(result);
                if(result != "true" && result != true){
                    alert('修改失败');
                }else{
                    alert('修改成功');
                }
            }
        });
    });


    $(function () {
        var bar = $('.bar');
        var percent = $('.percent');
        var showimg = $('#showimg');
        var progress = $(".progress");
        var files = $(".files");
        var btn = $(".btn span");
        $("#picOper").wrap("<form id='myupload' action='?r=user/savePic&act=0' method='post' enctype='multipart/form-data'></form>");
        //$("#fileupload").change(function(){
        $("#submitfile").live('click',function(){
            var upFiles = $("#fileupload").get(0).files;
            if(upFiles == undefined || upFiles.length == 0){
                return;
            }
            $("#myupload").ajaxSubmit({
                dataType:  'json',
                /*
                 beforeSend: function() {
                 showimg.empty();
                 progress.show();
                 var percentVal = '0%';
                 bar.width(percentVal);
                 percent.html(percentVal);
                 btn.html("上传中...");
                 },
                 uploadProgress: function(event, position, total, percentComplete) {
                 var percentVal = percentComplete + '%';
                 bar.width(percentVal);
                 percent.html(percentVal);
                 },*/
                success: function(data) {
                    //files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
                    //var img = data.pic;
                    showimg.attr("src",data.pic);
                    //showimg.html("<img src='"+img+"'>");
                    //btn.html("添加附件");
                },
                error:function(xhr){
                    btn.html("上传失败");
                    bar.width('0')
                    files.html(xhr.responseText);
                }
            });
        });
        /*
         $(".delimg").live('click',function(){
         var pic = $(this).attr("rel");
         $.post("action.php?act=delimg",{imagename:pic},function(msg){
         if(msg==1){
         files.html("删除成功.");
         showimg.empty();
         progress.hide();
         }else{
         alert(msg);
         }
         });
         });*/

    });
</script>