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
        <li class="fran_a_active">
            <a href="?r=shop/franchisees/tofran&id=<?php echo $model->id?>">
                货物上架管理
            </a>
        </li>
        <li >
            <a href="<?php echo Yii::app()->createUrl('shopproduct/shop'); ?>">
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
            <li class="active" >
                <a href="#" id="<?php echo $cataTypes[0]->code?>"><?php echo $cataTypes[0]->value?></a>
            </li>
            <input type="hidden" id="page-type-<?php echo $cataTypes[0]->code?>" value="1">
        <?php
            for($i =1;$i<$length;$i++){
        ?>
                <li>
                    <a href="#" id="<?php echo $cataTypes[$i]->code?>"><?php echo $cataTypes[$i]->value?></a>
                </li>
                <input type="hidden" id="page-type-<?php echo $cataTypes[$i]->code?>" value="1">
        <?php
            }
        }
        ?>
    </ul>
    <div  id="oper" style="margin: 20px 70px 0 0;float: right">
        <button class="btn btn-primary" onclick="distribute()">货架发布</button>
        <button class="btn btn-primary" onclick="window.open('?r=shopproduct/shop&id=<?php echo $model->id?>')"
                style="margin-left: 20px">查看店铺</button>
    </div>
    <div style="clear: both;"></div>
    <div id="product-content">
    <?php
    if($length>0){
        ?>
        <div id="index-product-<?php echo $cataTypes[0]->code?>" class="row">
        </div>
        <?php
        for($i =1;$i<$length;$i++){
            ?>
            <div id="index-product-<?php echo $cataTypes[$i]->code?>" class="row" style="display: none">
            </div>
        <?php
        }
    }
    ?>
    </div>
</div>

<!--<input type="hidden" id="page-type-food" value="1">-->
<!--<input type="hidden" id="page-type-drink" value="1">-->
<!--<input type="hidden" id="page-type-life" value="1">-->

<script>
    var products;
    var delproduct = new Array();
    function distribute(){
        products = getAllProduct();
        if(products != null && products.length > 0){
            if(delproduct == null || delproduct.length == 0){
                delproduct = '0';
            }
//            var loginname = $("#loginname").val();
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'products':products,'delproduct':delproduct},
                url:'?r=shop/franchisees/toshop',
                success:function(json) {
                    var result = json.result;
                    if(result == "true"){
                        //清除所有商品的cookie
                        for(var i=0;i<products.length;i++){
                            var product = products[i];
                            delProduct(product.type,product.No);
                        }
                        delproduct = new Array();
                        refreshCart();
                        alert('发布成功');
                        window.open("<?php echo Yii::app()->createUrl('shopproduct/shop&id='.$model->id); ?>");
                    }else{
                        alert('发布失败');
                    }
                }
            });
        }
    }

    var active_type = "food";
    var page = 1;

    $("#product-type li a").live("click",function(){
        var type = $(this).attr("id");
        var old_type = active_type;
        active_type = type;
        $(this).parent().attr("class","active");
        $("#"+old_type).parent().attr("class","");

        $("#index-product-"+old_type).hide();
        $("#index-product-"+active_type).show();

        page = $("#page-type-"+active_type).val();
        if(page == 1){
            loadData();
        }
    });
    var handler = null;
    var isLoading = false;
    /**
     * When scrolled all the way to the bottom, add more tiles.
     */
    function onScroll(event) {
        // Only check when we're not still waiting for data.
        if(!isLoading) {
            // Check if we're within 100 pixels of the bottom edge of the broser window.
            var closeToBottom = ($(window).scrollTop() + $(window).height() > $(document).height() - 150);
            if(closeToBottom) {
                loadData();
            }
        }
    };

    /**
     * Loads data from the API.
     */
    function loadData() {
        isLoading = true;
        //$('#loaderCircle').show();

        $.ajax({
            type:'POST',
            dataType:'json',
            async:false,
            url: '?r=shop/franchisees/listIndex',
            //data:{'page':page},
            data:{'page':page,'type':active_type},
            success: onLoadData
        });
    };

    /**
     * Receives data from the API, creates HTML for images and updates the layout
     */
    function onLoadData(data) {
        isLoading = false;
        //$('#loaderCircle').hide();

        // Increment page index for future calls.
        page++;
        $("#page-type-"+active_type).val(page);
        // Create HTML for the images.
        var html = '';
        var i=0, length=data.length, image;
        for(; i<length; i++) {
            image = data[i];
            html += '<div id="tttdffimg" class="module span3">';

            // Image tag (preview in Wookmark are 200px wide, so we calculate the height based on that).
            html += '<a class="indexpic" href="?r=product/view&id='+image.id+'">'
            +'<img src="'+image.pic+'" alt="Placeholder" class="thumbnail"></a>'
            +'<div id="blk_'+image.id
                +'" style="margin:10px 0 0px 0;width: 180px;height:37px"><a href="?r=product/view&id='+image.id+'">'
            +image.name+'</a>&nbsp;&nbsp;&nbsp;&nbsp;￥：'
            +image.price;
            if(checkCookie(active_type,image.id) || image.status == '1'){
                html += '<div id="block_'+image.id+'">已上架<button id="del_'+image.id+'"  onclick="delItem(\''
                    +active_type+'\','+image.id+',\''+image.name+'\','+image.price+',\''+image.pic
                    +'\')" style="float:right;background-color:#429EA6;color:#ffffff">删除</button>';
                html += '</div>';
            }else{
                html += '<img id="image_'+image.id+'" src="upload/icon/addItem.png" onclick="addItem(\''
                    +active_type+'\','+image.id+',\''+image.name+'\','+image.price+',\''+image.pic
                    +'\')" alt="添加到货架" style="float:right;margin-top:-5px;cursor:pointer;">';
            }
            html += '</div></div>';
        }

        // Add image HTML to the page.
        $('#index-product-'+active_type).append(html);

        // Apply layout.
        //applyLayout();
    };

    function loadSlider(){
        $.ajax({
            type:'POST',
            dataType:'json',
            async:false,
            url: '?r=site/listslider',
            success: function(sliderArr){
                var html = '',slider;
                for(i=0; i<sliderArr.length; i++) {
                    slider = sliderArr[i];
                    html += '<li><h1 class="main_title">'+slider.title+'</h1>'
                        +'<p class="subtitle">'+slider.content+'</p>'
                        +'<img src="'+slider.pic+'" alt="slider 2" />'
                        +'</li>';
                }
                $('#slidershow_ul').append(html);
            }
        });
    }

    function checkCookie(type,id){
        return checkProduct(type,id);
    }

    function delItem(type,id,name,price,pic){
        //如果已经在cookie中，表示该商品已经添加到货架或是曾经被删除，不需要从数据库中再删除一遍
        if(checkProduct(type,id)){
            delProduct(type,id);
            refreshCart();
        }else{ //记录到待删除表中，发布货架时一并删除
            delproduct.push(id);
        }

        $("#block_"+id).remove();
        var html = '<img id="image_'+id+'" src="upload/icon/addItem.png" onclick="addItem(\''
            +active_type+'\','+id+',\''+name+'\','+price+',\''+pic
            +'\')" alt="添加到货架" style="float:right;margin-top:-5px;cursor:pointer;">';
        $('#blk_'+id).append(html);
    };

    function addItem(type,id,name,price,pic){
        addProduct(type,id,name,price,pic,1);
        refreshCart();
        //alert('已放到货架上^_^');
        var html = '<div id="block_'+id+'">已上架';
        html += '<button id="del_'+id+'" href="#" onclick="delItem(\''
            +active_type+'\','+id+',\''+name+'\','+price+',\''
            +pic+'\')" style="float:right;background-color:#429EA6;color:#ffffff">删除</button>';
        html +='</div>';
        $("#blk_"+id).append(html);
        $("#image_"+id).remove();
    };

    $(document).ready(new function() {
        loadSlider();
        // Capture scroll event.
        // 注：官方的示例这里使用 $(document) 来绑定 scroll 事件是不支持 IE6-8 的，如需支持 IE6-8 请使用 $(window).bind('scroll', onScroll);
        //$(document).bind('scroll', onScroll);
        $(window).bind('scroll', onScroll);

        // Load first data from the API.
        loadData();
    });
</script>