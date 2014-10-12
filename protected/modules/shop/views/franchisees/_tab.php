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
        <li class="active">
            <a href="?r=shop/franchisees/view&id=<?php echo $id?>" name="infoChange">
                <i class="icon-male "></i>
                个人信息
            </a>
        </li>
        <li>
            <a onclick="change(this)" name="passwordChange">
                修改个人信息
            </a>
        </li>
        <li>
            <a href="?r=shop/franchisees/changePwd&id=<?php echo $id?>" name="passwordChange">
                修改密码
            </a>
        </li>

        <li>
            <a onclick="change(this)" name="passwordChange" >
                店铺装饰
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