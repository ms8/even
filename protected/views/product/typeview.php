<?php
/* @var $this ProductController */
/* @var $model Product */

//$this->breadcrumbs=array(
//	'Products'=>array('index'),
//	$model->name,
//);

?>

<!-- Start right Sidebar  -->
<div class="row">
    <?php $this->renderPartial('producttype',array('topTypeArr'=>$topTypeArr,'topType'=>$topType)); ?>
<!--    <div class="span3" style="margin-right:10px">-->
<!--        <div class="sidebar-nav">-->
<!--            <div class="base" style="margin-top: 50px;">-->
<!--                --><?php
//                    foreach($topTypeArr as $tp){
//                ?>
<!--                <ul class="nav nav-list">-->
<!--                    <li class="active" >-->
<!--                        <a href="#">-->
<!--                            <div class="fs1" aria-hidden="true" data-icon=""></div>-->
<!--                            --><?php //echo $tp->value;?>
<!--                        </a>-->
<!--                    </li>-->
<!---->
<!--                --><?php
//                        $arr = $topType[$tp->code];
//                        foreach($arr as $type){
//                ?>
<!--                            <li>-->
<!--                                <a href="?r=product/typeView&type=--><?php //echo $type->code?><!--">-->
<!--                                    --><?php //echo $type->value?>
<!--                                </a>-->
<!--                            </li>-->
<!--                --><?php
//                        }
//                ?>
<!--                </ul>-->
<!--                        <br>-->
<!--                --><?php
//                    }
//                ?>
<!--            </div>-->
<!--            <hr>-->
<!--        </div>-->
<!--    </div>-->

    <div class="span8" >
        <div id="index-product-<?php echo $mainType?>" class="row" style="margin-top:75px;width: 750px">
            <?php
            foreach($products as $product){
            ?>
            <div class="module span3">
                <a href="?r=product/view&id=<?php echo $product->id?>" class="indexpic">
                    <img class="thumbnail" alt="Placeholder" src="<?php echo $product->pic?>">
                </a>
                <div style="margin:12px 0 35px 0;width: 180px;">
                    <a href="?r=product/view&id=<?php echo $product->id?>">
                        <?php echo $product->name?>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;￥：<?php echo $product->price?>
                    <img style="float:right;margin-top:-5px;cursor:pointer;" alt="购物车"
                         onclick="addItem('<?php echo $product->id?>','<?php echo $product->name?>',
                         <?php echo $product->price?>,'<?php echo $product->pic?>')"
                         src="upload/cart.png">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>
<!-- </div>
</div> -->

<!-- End right Sidebar  -->

<input id="maintype" type="hidden" value="<?php echo $mainType?>">

</div>

<script>
    var isLoading = false;
    var page = 2;
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
            url: '?r=site/listIndex',
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
                +'<div style="margin:12px 0 35px 0;width: 180px;"><a href="?r=product/view&id='+image.id+'">'
                +image.name+'</a>&nbsp;&nbsp;&nbsp;&nbsp;￥：'
                +image.price+'<img src="upload/cart.png" onclick="addItem('
                +image.id+',\''+image.name+'\','+image.price+',\''+image.pic+'\')" alt="购物车" style="float:right;margin-top:-5px;cursor:pointer;"></div></div>';
        }

        // Add image HTML to the page.
        $('#index-product-'+active_type).append(html);

    };

    $(document).ready(new function() {
        // Capture scroll event.
        // 注：官方的示例这里使用 $(document) 来绑定 scroll 事件是不支持 IE6-8 的，如需支持 IE6-8 请使用 $(window).bind('scroll', onScroll);
        $(window).bind('scroll', onScroll);

        // Load first data from the API.
        //loadData();
    });

    function addItem(id,name,price,pic){
        addProduct(id,name,price,pic,1);
        refreshCart();
        alert('已添加到购物车^_^');
    };



    function reduce(){
        var nr = $("#quantity").val();
        if(nr > 1){
            nr--;
            $("#quantity").val(nr);
        }
    }
    function add(){
        var na = $("#quantity").val();
        var kc = $("#kucun").val();
        kc = parseInt(kc);
        if(na < kc){
            na++;
            $("#quantity").val(na);
        }else{
            alert("这款商品实在是太畅销了，仅剩"+na+"份了，我们将马上进货，给您造成的困扰敬请谅解，谢谢");
        }
    }

    $("#submitBt").click(function(){
       var price = $("#price").text();
       var quantity = $("#quantity").val();
       var name = $("#name").text();
       var id = $("#productId").val();
       var pic = $("#mainPic").attr("src");

       addProduct(id,name,price,pic,quantity);
       refreshCart();
    });

    $("a img").live("mouseover",function(){
        var src = $(this).attr("src");
        $("#mainPic").attr("src",src);
    });

    $("a img").live("click",function(){
        var src = $(this).attr("src");
        $("#mainPic").attr("src",src);
    });

</script>