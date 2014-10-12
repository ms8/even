<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />
  <!--  -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.imgPre.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" media="screen, projection" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" media="screen, projection" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styleindex.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/franchisees.css">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/min.js"></script>

<!--    <script  type="text/javascript" src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/script.js"></script>-->
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.imgPre.js"></script>

    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <style type="text/css">
        .slide_entry ul, .slide_entry ol {
            margin: 0 0 10px;
        }
        #summary_left,#summary_right{
            width:330px;
        }
        #summary_right{
            margin-left: 45px;
        }
        #rightSide{
            width:215px;
            float:right;
        }
        #cat2{
            background:#00A380;
        }
        #cat3{
            background:#FF9000;
        }
        #cat4{
            background:#BB1E4A;
        }
        .planning a:hover #cat2 {
            background:#fff;
            color:#00A300;
            text-shadow: none;
        }
        .planning a:hover #cat_bot2 {
            background:#00A380;
            color:#fff;
            text-shadow: 0 -1px 0 rgba(0,0,0,0.28);
            border-right:1px solid #00A300;
            border-bottom:1px solid #00A300;
            border-left:1px solid #00A300;
            /*border-left:1px solid #7cb3ff;*/
            -webkit-animation: moveFromBottom 500ms ease;
            -moz-animation: moveFromBottom 500ms ease;
            -ms-animation: moveFromBottom 500ms ease;
        }
        .planning a:hover #cat3 {
            background:#fff;
            color:#FF9000;
            text-shadow: none;
        }
        .planning a:hover #cat_bot3 {
            background:#FF9000;
            color:#fff;
            text-shadow: 0 -1px 0 rgba(0,0,0,0.28);
            border-right:1px solid #FF9000;
            border-bottom:1px solid #FF9000;
            border-left:1px solid #FF9000;
            -webkit-animation: moveFromBottom 500ms ease;
            -moz-animation: moveFromBottom 500ms ease;
            -ms-animation: moveFromBottom 500ms ease;
        }
        .planning a:hover #cat4 {
            background:#fff;
            color:#BB1E4A;
            text-shadow: none;
        }
        .planning a:hover #cat_bot4 {
            background:#BB1E4A;
            color:#fff;
            text-shadow: 0 -1px 0 rgba(0,0,0,0.28);
            border-right:1px solid #BB1E4A;
            border-bottom:1px solid #BB1E4A;
            border-left:1px solid #BB1E4A;
            -webkit-animation: moveFromBottom 500ms ease;
            -moz-animation: moveFromBottom 500ms ease;
            -ms-animation: moveFromBottom 500ms ease;
        }
        /*a img{*/
            /*height: 80px;*/
        /*}*/
        .grid-view .button-column {
            text-align: center;
            width: 100px;
        }
        .indexpic img{
            height: 170px;
            width: 180px;
        }
        .thumbnail img{
            height: 140px;
            width: 140px;
            border-radius: 200px 200px 200px 200px;
        }

        footer {
            border: medium none;
            height: 40px;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }
        footer p {
            margin-top: 23px;
            font-size: 13px;
            font-weight: normal;
            line-height: 18px;
            margin-bottom: 9px;
        }
        #footer {
            background-color: #ffffff;
        }
        .peopleIcon{
            background: url("images/tmp/people.png");
            height: 30px;
            width: 27px;
        }
        .calendarIcon{
            background: url("images/tmp/postDate.png");
            height: 33px;
            width: 32px;
        }
        .commentsIcon{
            background: url("images/tmp/cm.png");
            height: 32px;
            width: 32px;
        }
        .edit a,.edit span{
            float: right;
            margin-right:5px
        }
        .post_carousel .post_date{
            border-radius: 140px;
            width: 100px;
            height: 100px;
        }
        .post_carousel .post_date img{
            background-color: #FFFFFF;
            border-radius: 100px;
            height: 100px;
            padding: 4px;
        }
        .post_content a{
            color: #555555;
        }
        .post_more{
            color: #BB1E4A;
        }
        #menuTop li{
            margin-left: 25px;
        }
        .menuActive{
            color:#FF9000;
            font-size:20px;
        }
        .reduce,.add{
            border: 1px solid;
            display: block;
            float: left;
            height: 16px;
            margin: 5px;
            padding: 0 0 16px 4px;
            width: 16px;
        }
        .product-list-title{
            /*width: 400px;*/
            /*height: 27px;*/
            /*background-color: #BB1E4A;*/
            border: 1px solid #FFE29F;
        }
        .form-horizontal .control-label {
            width: 100px;
        }
        .form-horizontal .controls {
            margin-left: 10px;
        }
        .nav li a:hover{
            background-color: #1D7FF0;
            color: #ffffff;
        }
    </style>
</head>

<body>

<div class="container_12" id="page">

    <!-- 注册框-->
    <div id="registerCat" class="modal hide" style="width: 500px;">
        <div class="modal-header">
            <a id="register-close"class="close" href="#" data-dismiss="modal">x</a>
            <h6>创建管理员</h6>
        </div>

        <form class="form-horizontal" style="text-align: center" method="post"
              action="?r=xyadmindash/xyAdmins/create" id="mainform">
            <fieldset >
                <div class="control-group">
                    <label class="control-label" for="input01">登录名称</label>
                    <div class="controls">
                        <input type="text" placeholder="登录邮箱" class="input-xlarge" name="XyAdmins[username]">
                    </div>
                </div>
                <div class="control-group">
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
                    <div class="controls">
                        <button id="createAdmin" class="btn btn-primary" >创建管理员</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

    <!-- 登录框-->
<!--    <div id="loginCat" class="modal hide" style="width: 400px;">-->
<!--        <div class="modal-header">-->
<!--            <a id="login-close" class="close" href="#" data-dismiss="modal">x</a>-->
<!--            <h6>快速登录</h6>-->
<!--        </div>-->
<!---->
<!--        <form action="#" class="well" style="margin:0;">-->
<!--            <div class="modal-body" style="padding:0;">-->
<!--                <div class="control-group">-->
<!--                    <label class="control-label" >用户名</label>-->
<!--                    <input id="l-username" type="text" name="username" class="input-large" required>-->
<!--                </div>-->
<!--                <div class="control-group">-->
<!--                    <label class="control-label" >密码</label>-->
<!--                    <input id="l-password" type="password" name="password" class="input-large" required>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn" onclick="login()">提交</button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->

    <div class="grid_12">
        <!-- ************************************** --->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="index.html" data-section="html" class="brand scroller">新&nbsp;芽</a>
                    <div class="nav-collapse collapse">
                        <ul id="menuTop" class="nav pull-right">
                            <?php
                            if(!isset($_SESSION['admin_user'])) {
                            ?>
                            <li><a href="#" data-toggle="modal" data-target="#registerCat">注册</a></li>
                            <?php }else{?>
                            <li><a href="#" data-toggle="modal" data-target="#loginCat">
                                    账号：<?php echo  $_SESSION['admin_user'] ?>
                                </a>
                            </li>
                            <li><a href="?r=xyadmindash/xyadmins/logout" data-toggle="modal" >退出</a></li>
                            <?php }?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************** -->

    </div>
    <div class="clear"></div>

	<?php echo $content; ?>

	<div class="clear"></div>

    <!-- *********************************************************************************** -->
</div><!-- page -->

<!--footer-->
<div id="footer" >

    <div class="container">
        <footer>
            <p>
                <a title="Buyer and seller support" href="/support">Support</a>
                <a title="Help topics" href="/help">Help topics</a>
                <a title="Affiliates" href="/affiliates">Affiliates</a>
                <a title="Privacy policy" href="/privacy">Privacy policy</a>
                <a title="Terms of use" href="/terms">Terms of use</a>
                <a title="About us" href="/about">About us</a>
                <a title="Contact us" href="/contact">Contact us</a>
                            <span class="pull-right">
                            <span class="pull-right" style="position: relative; top: -2px;">
            </p>
        </footer>
    </div>
</div>
<!--//footer-->

</body>

<script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cookie-script.js"></script>

<script>
    //创建管理员
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

//    function register(){
//        $("#register").trigger("click");
//        var username = $("#r-username").val();
//        var password = $("#r-password").val();
//        var email = $("#r-email").val();
//        $.ajax({
//            type:'POST',
//            dataType:'json',
//            async:false,
//            data:{'username':username,'password':password,'email':email},
//            url:'?r=site/register',
//            success:function(json) {
//                location.reload();
//            }
//        });
//        location.reload();
//    }

//    function login(){
//        var username = $("#l-username").val();
//        var password = $("#l-password").val();
//        $.ajax({
//            type:'POST',
//            dataType:'json',
//            data:{'username':username,'password':password},
//            url:'?r=xyadmindash/xyadmins/login',
//            success:function(json) {
//                var result = json.result;
//                if(result == false){
//                    alert('用户名或者密码错误，请重新登录');
//                }else{
//                    $("#login-close").trigger("click");
//                    location.href = "?r=xyadmindash/xyadmins/view&id="+result;
//                }
//            }
//        });
//        //location.reload();
//    }

</script>
</html>
