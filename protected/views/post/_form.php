<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="container">
<div class="row" style="margin-top:20px">
<div class="col-md-8 blog-main">
    <form style="margin-top:10px">
<!--
        <textarea id="elm1" name="elm1" class="xheditor {tools:'Fontface,FontSize,Bold,Italic,Underline,FontColor,Align',skin:'default'}" rows="25" cols="80" style="width: 100%">
            <input id="title2" name="title2" placeholder="这里输入标题">
        </textarea>
-->
        <div id="myNicPanel" style="width: 620px;"></div>
        <div style="height:35px;width: 620px;border-left:1px solid #000;border-right:1px solid #000;">
            <input style="height:35px;width: 618px;text-align: left" type="text" name="title" id="title"  placeholder="这里输入标题" value="">
        </div>

        <div id="myInstance1" style=" border-left:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;width: 620px;height: 300px;">
        </div><br />

        <div id="newCat" class="modal hide" style="width: 400px;">
            <div class="modal-header">
                <a class="close" href="#" data-dismiss="modal">x</a>
                <h6>新建分类</h6>
            </div>
            <div class="modal-body">
                <form action="#" class="well">
                    <div class="control-group">
                        <label class="control-label" for="password1">分类名称</label>
                        <input id="catname" type="text" value="" class="input-large">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn" >提交</button>
            </div>
        </div>

        <div style="width: 320px;float:right">

            <div style="float: left;margin-right: 20px;">
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">权限设置 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">仅自己可见</a></li>
                            <li><a href="#">好友可见</a></li>
                            <li><a href="#">公开</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="float: left;margin-right: 30px;">
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">分类 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">秋日私语</a></li>
                            <li><a href="#">那些年</a></li>
                            <li><a href="#">那些事</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#newCat">+ &nbsp;&nbsp;新建分类</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


            <button style="float:left;width:100px;height:35px;" type="submit" class="btn" >
                提交
            </button>

        </div>
    </form>
</div>
<aside class="col-md-4 blog-aside">

    <div class="aside-widget">
        <header >
            <h3 >最近浏览的文章</h3>
        </header>
        <div class="body">
            <ul class="tales-list">
                <li><a href="http://demo.hackerthemes.com/tales/html-version/v2/index.html">Email Encryption Explained</a></li>
                <li><a href="#">Selling is a Function of Design.</a></li>
                <li><a href="#">It’s Hard To Come Up With Dummy Titles</a></li>
                <li><a href="#">Why the Internet is Full of Cats</a></li>
                <li><a href="#">Last Made-Up Headline, I Swear!</a></li>
            </ul>
        </div>
    </div>
</aside>
</div>
</div>

<script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/nicEdit.js"></script>
<script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-dropdown.js"></script>


<script type="text/javascript">


    //$('#myModal').modal({ backdrop:false});

    //$('#myDropdown').dropdown()
    //<![CDATA[
    bkLib.onDomLoaded(function() {
        var myNicEditor = new nicEditor();
        myNicEditor.setPanel('myNicPanel');
        myNicEditor.addInstance('myInstance1');

        //myNicEditor.addInstance('myInstance2');
        //myNicEditor.addInstance('myInstance3');
    });
    //]]>
</script>