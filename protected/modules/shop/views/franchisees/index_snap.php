<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="span3"  style="margin:60px 0 0 180px;float:left;">
    <div class="account-container">
        <div class="account-avatar">
            <img src="" alt="" class="thumbnail">
        </div>
        <div class="account-details">
            <span class="account-name">Rod Howard</span>
            <span class="account-role">Administrator</span>
			<span class="account-actions">
                <a href="javascript:;">Profile</a> |
				<a href="javascript:;">Edit Settings</a>
			</span>
        </div>
    </div>
    <hr>
    <ul class="nav nav-tabs nav-stacked">
        <li >
            <a href="?r=shop/franchisees/view&id=<?php echo $model->id?>" name="infoChange">
                个人信息
            </a>
        </li>
        <li>
            <a href="?r=shop/franchisees/update&id=<?php echo $model->id?>" >
                维护个人信息
            </a>
        </li>
        <li>
            <a href="?r=shop/franchisees/changePwd&id=<?php echo $model->id?>" >
                修改密码
            </a>
        </li>
        <li>
            <a href="?r=shop/franchisees/tofran&id=<?php echo $model->id?>">
                货物上架管理
            </a>
        </li>
        <li class="fran_a_active">
            <a href="?r=shop/franchisees/snap&id=<?php echo $model->id?>">
                货架管理
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

<div class="clear"></div>

<div class="span11" style="margin-top: 55px;">
    <ul class="nav nav-tabs" id="product-type" style="margin-top: 30px;float: left;width:70%">
        <?php
        $length = count($cataTypes);
        if($length>0){
        ?>
            <input type="hidden" id="active_type" value="<?php echo $cataTypes[0]->code?>">
            <li class="active" >
                <a href="#" id="<?php echo $cataTypes[0]->code?>"><?php echo $cataTypes[0]->value?></a>
            </li>
        <?php
            for($i =1;$i<$length;$i++){
        ?>
                <li>
                    <a href="#" id="<?php echo $cataTypes[$i]->code?>"><?php echo $cataTypes[$i]->value?></a>
                </li>
        <?php
            }
        }
        ?>
    </ul>
    <div  id="oper" style="margin: 20px 100px 0 0;float: right">
        <button class="btn btn-primary" onclick="distribute()">货架发布</button>
    </div>
    <div style="clear: both;"></div>
    <div id="product-content">
    </div>
</div>

<input type="hidden" id="page-type-food" value="1">
<input type="hidden" id="page-type-drink" value="1">
<input type="hidden" id="page-type-life" value="1">

<script>


    var active_type = $("#active_type").val();

    var typeMap = new Map();

    $("#product-type li a").live("click",function(){
        var type = $(this).attr("id");
        var old_type = active_type;
        active_type = type;
        $(this).parent().attr("class","active");
        $("#"+old_type).parent().attr("class","");

        $("#index-product-"+old_type).hide();
        $("#index-product-"+active_type).show();

        if(typeMap.get(active_type) == null)
            loadData();

//        page = $("#page-type-"+active_type).val();
//        if(page == 1){
//            loadData();
//        }
    });

    /**
     * Receives data from the API, creates HTML for images and updates the layout
     */
    function loadData() {
        var products = getAllProduct();
        if(products != null){
            //$("#cart").text(products.length);
            for(var i=0;i<products.length;i++){
                var product = products[i];
                if(active_type != product.type){
                    continue;
                }
                var html = '<div id="block_'+product.No+'" class="module span3">';
                // Image tag (preview in Wookmark are 200px wide, so we calculate the height based on that).
                html += '<a class="indexpic" href="?r=product/view&id='+product.No+'">'
                    +'<img src="'+product.Pic+'" alt="Placeholder" class="thumbnail"></a>'
                    +'<div id="blk_'+product.No
                    +'" style="margin:12px 0 0px 0;width: 180px;height:37px"><a href="?r=product/view&id='+product.No+'">'
                    +product.Name+'</a>&nbsp;&nbsp;&nbsp;&nbsp;￥：'
                    +product.Price;
                html += '<a id="del_'+product.No+'" href="#" onclick="delItem(\''
                    +active_type+'\','+product.No+')" style="float:right;text-decoration: underline;">删除</a>';
                html += '</div></div>';
                //第一次出现时要创建标签页
                if(typeMap.get(active_type) == null){
                    var contentHtml = '<div id="index-product-'+active_type+'" class="row"></div>';
                    $('#product-content').append(contentHtml);
                }
                $('#index-product-'+product.type).append(html);
                typeMap.put(active_type,1);
            }
        }
    };

    function checkCookie(id){
        return checkProduct(id);
    }

    function delItem(type,id){
        delProduct(type,id);
        refreshCart();
        $("#block_"+id).remove();
    };

    $(function(){
        loadData();
    });

</script>