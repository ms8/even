<div class="row" style="margin:50px 0 100px -20px;">

    <div class="span3"  style="margin-top:30px;margin-left:-20px;float:left;">

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
                <a href="?r=shop/franchisees/view&id=<?php echo $id?>" name="infoChange">
                    个人信息
                </a>
            </li>
            <li>
                <a href="?r=shop/franchisees/update&id=<?php echo $id?>" name="passwordChange">
                    维护个人信息
                </a>
            </li>
            <li class="fran_a_active">
                <a href="?r=shop/franchisees/changePwd&id=<?php echo $id?>" name="passwordChange">
                    修改密码
                </a>
            </li>

<!--            <li>-->
<!--                <a onclick="change(this)" name="passwordChange" >-->
<!--                    店铺信息维护-->
<!--                </a>-->
<!--            </li>-->
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


    <div class="row" style="margin:10px 0 0 100px;float: left;">
        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                修改密码
            </h1>
        </div>



        <form class="form-horizontal" style="margin:30px 0 200px -60px;text-align: center" method="post"
              action="?r=shop/franchisees/changePwd" id="mainform">
            <fieldset >
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">登录密码</label>
                    <div class="controls">
                        <input type="password" id="password1" placeholder="登录密码" class="input-xlarge" name="Franchisees[password]">
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
                    <label class="control-label"></label>

                    <!-- Button -->
                    <div class="controls">
                        <button id="change_password" class="btn btn-primary" >修改密码</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

</div>

<script>
    //创建商品
    $("#change_password").live("click",function(){
        var p1 = $("#password1").val();
        var p2 = $("#password2").val();
        if(p1 != p2){
            alert('两次输入的密码不一致');
            return;
        }

        $("#mainform").submit();
    });
</script>