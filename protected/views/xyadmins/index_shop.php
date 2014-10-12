<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="grid_12" style="margin-top: 55px;">
    <div id="slider">
        <div id="slideshow">
            <div class="slide_entry">
                <ul id="slidershow_ul">
                </ul>
                <div id="number"></div>
            </div>
            <!-- end slide_entry_full div -->

        </div>
        <!-- end slideshow_full div -->

    </div>
    <!--slider end here-->

</div>
<!--grid_12 end here-->
<div class="clear"></div>

<ul class="nav nav-tabs" id="product-type" style="margin-top: 30px;">
    <?php
    $length = count($cataTypes);
    if($length>0){
    ?>
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

<div id="loader">
    <div id="loaderCircle" style='display: none;background-image: url("/images/bg/loading.gif")'></div>
</div>

<input type="hidden" id="page-type-food" value="1">
<input type="hidden" id="page-type-drink" value="1">
<input type="hidden" id="page-type-life" value="1">

<script>
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
//    var apiURL = 'http://www.wookmark.com/api/json/popular'
//
//    // Prepare layout options.
//    var options = {
//        autoResize: true, // This will auto-update the layout when the browser window is resized.
//        container: $('#index-product'), // Optional, used for some extra CSS styling
//        offset: 2, // Optional, the distance between grid items
//        itemWidth: 210 // Optional, the width of a grid item
//    };

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
     * Refreshes the layout.
     */
//    function applyLayout() {
//        // Clear our previous layout handler.
//        if(handler) handler.wookmarkClear();
//
//        // Create a new layout handler.
//        handler = $('#index-product div');
//        handler.wookmark(options);
//    };

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


//        $.ajax({
//            type:'POST',
//            dataType:'json',
//            async:false,
//            data:{'username':'11','password':'22','email':'33'},
//            url:'?r=site/register',
//            success:function(json) {
//               // location.reload();
//            }
//        });
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

    function addItem(id,name,price,pic){
        addProduct(id,name,price,pic,1);
        refreshCart();
        alert('已添加到购物车^_^');
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