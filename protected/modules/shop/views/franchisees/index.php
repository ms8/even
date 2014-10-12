<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="jumbotron masthead">
    <div class="container">
        <div id="loginCat" style="width: 400px;margin:10px 0 100px 250px">

            <form action="#"  style="border:1px solid;margin-top:-5px;padding:20px">
                <div  style="padding:0;">
                    <div class="control-group">
                        <label class="control-label" >用户名</label>
                        <input id="l-username" type="text" name="username" class="input-large" required>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >密码</label>
                        <input id="l-password" type="password" name="password" class="input-large" required>
                    </div>
                </div>
                <div >
                    <button type="button" class="btn" style="float:right" onclick="login()">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="clear"></div>


<script>

    function login(){
        var username = $("#l-username").val();
        var password = $("#l-password").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username,'password':password},
            url:'?r=shop/franchisees/login',
            success:function(json) {
                var result = json.result;
                if(result == false){
                    alert('用户名或者密码错误，请重新登录');
                }else{
                    $("#login-close").trigger("click");
                    location.href = "?r=shop/Franchisees/view&id="+result;
                }
            }
        });
        //location.reload();
    }
</script>
