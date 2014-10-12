

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
            <li >
                <a href="?r=xyadmindash/xyadmins/view&id=<?php echo $id?>">
                    个人信息
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/xyadmins/update&id=<?php echo $id?>">
                    维护个人信息
                </a>
            </li>
            <li>
                <a href="?r=xyadmindash/xyadmins/changePwd&id=<?php echo $id?>">
                    修改密码
                </a>
            </li>

            <li class="fran_a_active">
                <a href="?r=xyadmindash/xyadmins/producttype&id=<?php echo $id?>" >
                    创建商品分类
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

    <div class="row" style="float: right;margin: 10px 300px 0 0px;">
        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                新建商品类型
            </h1>
        </div>

<!--        <h1>选择父类型</h1>-->
        <label class="control-label">父类型</label>
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

        <form method="post" action="?r=productType/create" style="margin-top: 0px;">
            <input id="ProductType_parent_code"
                   type="hidden" name="ProductType[parent_code]" >
            <input id="ProductType_parent_value"
                   type="hidden" name="ProductType[parent_code_value]" maxlength="10" size="10">

            <div class="row ">
                <label class="control-label" >类别代码</label>
                <input id="ProductType_code" type="text" name="ProductType[code]" maxlength="10" size="10">
            </div>

            <div class="row">
                <label class="control-label" >类别名称</label>
                <input id="ProductType_value" type="text" name="ProductType[value]" maxlength="100" size="60">
            </div>

            <div class="row">
                <input id="ProductType_isparent" type="hidden" name="ProductType[isparent]">
<!--                <h3>是否作为父类别：</h3>-->
                <label class="control-label" style="width:120px;text-align:left;">是否作为父类别：</label>
                <label class="radio inline">
                    <input type="radio" name="isparent" value="1"> 是
                </label>
                <label class="radio inline">
                    <input type="radio" name="isparent" value="0" checked> 否
                </label>
            </div>

            <div class="row buttons">
                <input type="submit" value="新建"  style="margin-left: 230px;"
                       class="btn btn-primary" id="createBt">
            </div>
        </form>

    </div>


</div>
