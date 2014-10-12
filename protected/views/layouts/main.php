<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960.css" media="screen, projection" />
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

    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.imgPre.js"></script>
<!--
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/xheditor-1.2.1.min.js"></script>
    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/zh-cn.js"></script>

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/nicEdit.js"></script>
-->

    <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <!--
    <script  type="text/javascript" src="/js/jquery.wookmark.min.js"></script>
    -->

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
        a img{
            height: 80px;
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
        footer p a{
            color: #FFFFFF;
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
    </style>
</head>

<body>

<div class="container_12" id="page">

    <!-- 注册框-->
    <div id="registerCat" class="modal hide" style="width: 400px;">
        <div class="modal-header">
            <a id="register-close"class="close" href="#" data-dismiss="modal">x</a>
            <h6>注册新用户</h6>
        </div>

        <form action="?r=site/register" class="well" style="margin:0;">
            <div class="modal-body" style="padding:0;">
                <div class="control-group">
                    <label class="control-label" >用户名</label>
                    <input id="r-username" type="text" name="username" class="input-large" required>
                </div>
                <div class="control-group">
                    <label class="control-label" >密码</label>
                    <input id="r-password" type="password" name="password" class="input-large" required>
                </div>
                <div class="control-group">
                    <label class="control-label" >确认密码</label>
                    <input id="r-conformp" type="password" name="password-confirm" class="input-large" required>
                </div>
                <div class="control-group">
                    <label class="control-label" >邮箱</label>
                    <input id="r-email" type="text" name="email" class="input-large" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="register()">提交</button>
            </div>
        </form>
    </div>

    <!-- 登录框-->
    <div id="loginCat" class="modal hide" style="width: 400px;">
        <div class="modal-header">
            <a id="login-close" class="close" href="#" data-dismiss="modal">x</a>
            <h6>快速登录</h6>
        </div>

        <form action="#" class="well" style="margin:0;">
            <div class="modal-body" style="padding:0;">
                <div class="control-group">
                    <label class="control-label" >用户名</label>
                    <input id="l-username" type="text" name="username" class="input-large" required>
                </div>
                <div class="control-group">
                    <label class="control-label" >密码</label>
                    <input id="l-password" type="password" name="password" class="input-large" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="login()">提交</button>
            </div>
        </form>
    </div>

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
                            <li><a  class="menuActive" href="<?php echo Yii::app()->request->baseUrl?>">首页</a></li>
                            <li><a   href="#">休闲美食</a></li>
                            <li><a   href="#">甜美饮品</a></li>
                            <li><a   href="#">生活必备</a></li>
                            <?php
                                if(Yii::app()->user->isGuest) {
                            ?>
                            <li><a href="#" data-toggle="modal" data-target="#loginCat">登录</a></li>
                            <li>
                                <a href="?r=user/create">注册</a>
<!--                                <a href="#" data-toggle="modal" data-target="#registerCat">注册</a>-->
                            </li>
                            <?php }else{?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <?php echo Yii::app()->user->name?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                     <li><a href="?r=user/view&id=<?php echo Yii::app()->user->id?>">个人中心</a></li>
                                     <li><a href="?r=site/logout">退出</a></li>
                                 </ul>
                            </li>
                            <?php }?>
                            <li>
                                <a  id="cart" style="float: right;color: #C51B00"
                                   href="#">
                                    <img id="carpic" src="upload/cart.png" alt="购物车" style="height:20px;width:20px" >
                                    <span id="cartnum"></span>
                                </a>
                            </li>
<!--                            <li class="dropdown">-->
<!--                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!--                                    Dropdown-->
<!--                                    <b class="caret"></b>-->
<!--                                </a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li><a href="#">Example Link</a></li>-->
<!--                                    <li><a href="#">Example Link 2</a></li>-->
<!--                                    <li><a href="#">Example Link 3</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
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

<!-- about us   ***************************************************************************-->
<!--<div id="about_us">-->
<!--    <div class="container">-->
<!--        <section>-->
<!--            <div class="row">-->
<!--                <div class="span-one-third">-->
<!--                    <h3>About Bootstrap</h3>-->
<!--                    <p><a title="Twitter Bootstrap" target="_blank" href="http://getbootstrap.com/">Bootstrap</a> is designed to help people of all skill levels &ndash; designer or developer, huge nerd or early beginner. Use it as a complete kit or use it to start something more complex.</p>-->
<!--                    <p>Unlike other front-end toolkits, Bootstrap was designed first and foremost as a styleguide to document not only its features, but best practices and living, coded examples.</p>-->
<!--                    <p>Built to support new HTML5 elements and syntax with progressively enhanced components.</p>-->
<!--                </div>-->
<!--                <div class="span-one-third">-->
<!--                    <h3>Browser support</h3>-->
<!--                    <p>Bootstrap is tested and supported in major modern browsers like Chrome, Firefox, and Internet Explorer.</p>-->
<!--                    <img width="280" height="52" title="Tested and supported in Chrome, Safari, Firefox, Internet Explorer, and Opera." alt="Tested and supported in Chrome, Safari, Firefox, Internet Explorer, and Opera." src="//s3.amazonaws.com/wrapbootstrap/live/imgs/browser_logos.png">-->
<!--                    <ul>-->
<!--                        <li>Chrome 14+</li>-->
<!--                        <li>Safari 5</li>-->
<!--                        <li>Firefox 5+</li>-->
<!--                        <li>Internet Explorer 7/8/9</li>-->
<!--                        <li>Opera 11</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="span-one-third">-->
<!--                    <h3>Features &amp; includes</h3>-->
<!--                    <p>Bootstrap provides an unparalleled array of features and reusable components that let you hit the ground running:</p>-->
<!--                    <ul>-->
<!--                        <li>Responsive <a target="_blank" title="Bootstrap documentation, Scaffolding" href="http://twitter.github.com/bootstrap/scaffolding.html">12-column grid</a></li>-->
<!--                        <li>13 custom, modular <a title="Bootstrap documentation, JavaScript" target="_blank" href="http://twitter.github.com/bootstrap/javascript.html">jQuery plugins</a></li>-->
<!--                        <li><a target="_blank" title="Bootstrap documentation, Base CSS" href="http://twitter.github.com/bootstrap/base-css.html">CSS styles</a> for forms, navigation &amp; more</li>-->
<!--                        <li>Dozens of reusable <a title="Bootstrap documentation, Components" target="_blank" href="http://twitter.github.com/bootstrap/components.html">components</a></li>-->
<!--                        <li>Components are scaled according to a range of resolutions and devices</li>-->
<!--                        <li>Built on <a title="LESS - The dynamic stylesheet language" target="_blank" href="http://lesscss.org/">LESS</a> (CSS included)</li>-->
<!--                        <li>Complete styleguide documentation</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
<!--    </div>-->
<!--</div>-->

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
    function register(){
        $("#register").trigger("click");
        var username = $("#r-username").val();
        var password = $("#r-password").val();
        var email = $("#r-email").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            async:false,
            data:{'username':username,'password':password,'email':email},
            url:'?r=site/register',
            success:function(json) {
                location.reload();
            }
        });
        location.reload();
    }

    function login(){
        var username = $("#l-username").val();
        var password = $("#l-password").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username,'password':password},
            url:'?r=site/login',
            success:function(json) {
                var result = json.result;
                if(result != true){
                    alert('用户名或者密码错误，请重新登录');
                }else{
                    $("#login-close").trigger("click");
                    location.reload();
                }
            }
        });
        //location.reload();
    }

    $("#cart").live('click',function(){
        var num = $("#cartnum").text();
        if(num!=null && num!="" && num!='0' && num!=0){
            window.location.href="?r=product/cart&fid=<?php if(isset( $this->f_id))echo $this->f_id?>";
        }
    });


    $(document).ready(new function() {
        refreshCart();
    });
</script>
</html>
