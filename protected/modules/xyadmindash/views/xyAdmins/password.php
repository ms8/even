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
            <li>
                <a href="?r=xyadmindash/xyadmins/view&id=<?php echo $id?>" >
                    个人信息
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/xyadmins/update&id=<?php echo $id?>" >
                    维护个人信息
                </a>
            </li>
            <li class="fran_a_active">
                <a href="?r=xyadmindash/xyadmins/changePwd&id=<?php echo $id?>" >
                    修改密码
                </a>
            </li>

            <li>
                <a href="?r=xyadmindash/xyadmins/producttype&id=<?php echo $id?>"  >
                    创建商品分类
                </a>
            </li>
            <li>
                <a onclick="change(this)" >
                    货物上架管理
                </a>
            </li>
            <li>
                <a onclick="change(this)" >
                    销售管理
                </a>
            </li>

        </ul>

        <br>
        <hr>

    </div>


    <div class="row" style="float: right;margin: 10px 300px 0 0px;">
        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                修改密码
            </h1>
        </div>



        <form class="form-horizontal" style="margin:30px 0 200px -60px;text-align: center" >
            <fieldset >
                <div class="control-group">
                    <label class="control-label" >新密码</label>
                    <div class="controls">
                        <input type="password" id="password_f" placeholder="登录密码" class="input-xlarge"
                               name="password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >确认密码</label>
                    <div class="controls">
                        <input type="password" placeholder="确认密码" id="password_s" class="input-xlarge" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="button" class="btn btn-primary" onclick="update()">修改密码</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

</div>

<input type="hidden" id="adminid" value="<?php echo $id?>">

<script type="text/javascript">
        function update(){
            var password = $("#password_f").val();
            var p2 = $("#password_s").val();
            //alert(password+","+p2);
            var id = $("#adminid").val();
            if(password != p2){
                alert('两次输入的密码不一致');
                return;
            }
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'password':password,'id':id},
                url:'?r=xyadmindash/xyadmins/changePwd',
                success:function(json) {
                    var result = json.result;
                    if(result == false){
                        alert('修改失败');
                    }else{
                        alert('修改成功');
                    }
                }
            });
        }
</script>