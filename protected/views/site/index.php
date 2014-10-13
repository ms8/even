<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="jumbotron masthead">
    <div class="container">
        <h1>新芽</h1>
        <br>
        <p>您的私家超市&nbsp;&nbsp;美好品质&nbsp;&nbsp;超快送达
            <!--MVC模式，易定制，组件化，易扩展，国际化-->
        </p>
        <p>
            <a href="#zone" style="background-color: #C40A90;"
               class="btn btn-large" id="yw0" href="">在下面选择服务区域
                <img src="images/icon/down.png" style="width:32px;height:32px">
            </a>

        </p>
<!---->
<!--        <ul class="masthead-links">-->
<!--            <li>-->
<!--                <a onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Jumbotron links', 'GitHub project']);" href="http://github.com/yincart/basic">GitHub project</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Jumbotron links', 'Examples']);" href="http://demo.yincart.com/">Examples</a>-->
<!--            </li>-->
<!--            <li> 1.0.6 </li>-->
<!--        </ul>-->
    </div>
</div>

<div class="clear"></div>

<div id="zone" class="row" style="margin:50px 160px; ">
    <div id="tttdffimg" class="module span3">
        <div style="background-color: #FEAEC9;height: 80px;padding: 25px 0;text-align: center;color:#fff;font-size:25px">
            <a href="?r=shopproduct/shop&id=1">南苑1</a>
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 15px;">
        <div style="background-color: #80A590;height: 50px;padding: 12px 0;text-align: center;color:#fff;font-size:20px">
            南苑2
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 15px;">
        <div style="background-color: #566F61;height: 50px;padding: 12px 0;text-align: center;color:#fff;font-size:20px">
            南苑3
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 15px;">
        <div style="background-color: #4795B2;height: 110px;padding: 40px 0;text-align: center;color:#fff;font-size:25px">
            南苑4
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 20px;margin-top:-15px">
        <div style="background-color: #90D444;height: 80px;padding: 25px 0;text-align: center;color:#fff;font-size:25px">
            南苑5
        </div>
    </div>
    <div id="tttdffimg" class="module span4" style="margin-left: 15px;margin-top:-45px">
        <div style="background-color: #4795B2;height: 110px;padding: 35px 0;text-align: center;color:#fff;font-size:30px">
            南苑6
        </div>
    </div>
    <div id="tttdffimg" class="module span2" style="margin-left: 15px;;margin-top:-45px">
        <div style="background-color: #7776A8;height: 110px;padding: 40px 0;text-align: center;color:#fff;font-size:25px">
            南苑7
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 15px;margin-top:15px">
        <div style="background-color: #80A590;height: 50px;padding: 12px 0;text-align: center;color:#fff;font-size:20px">
            南苑8
        </div>
    </div>
    <div id="tttdffimg" class="module span4" style="margin-left: 20px;margin-top:15px">
        <div style="background-color: #7776A8;height: 80px;padding: 25px 0;text-align: center;color:#fff;font-size:25px">
            南苑9
        </div>
    </div>
    <div id="tttdffimg" class="module span4" style="margin-left: 10px;margin-top:15px">
        <div style="background-color: #80A590;height: 80px;padding: 25px 0;text-align: center;color:#fff;font-size:25px">
            南苑10
        </div>
    </div>
    <div id="tttdffimg" class="module span3" style="margin-left: 10px;margin-top:15px;width:305px;">
        <div style="background-color: #566F61;height: 80px;padding: 25px 0;text-align: center;color:#fff;font-size:25px">
            南苑11
        </div>
    </div>


</div>

<script>

    /**
     * Receives data from the API, creates HTML for images and updates the layout
     */
//    function onLoadData(data) {
//        var isLoading = false;
//        //$('#loaderCircle').hide();
//
//        // Increment page index for future calls.
//        var page++;
//        $("#page-type-"+active_type).val(page);
//        // Create HTML for the images.
//        var html = '';
//        var i=0, length=data.length, image;
//        for(; i<length; i++) {
//            image = data[i];
//            html += '<div id="tttdffimg" class="module span3">';
//
//            // Image tag (preview in Wookmark are 200px wide, so we calculate the height based on that).
//            html += '<a class="indexpic" href="?r=product/view&id='+image.id+'">'
//            +'<img src="'+image.pic+'" alt="Placeholder" class="thumbnail"></a>'
//            +'<div style="margin:12px 0 35px 0;width: 180px;"><a href="?r=product/view&id='+image.id+'">'
//            +image.name+'</a>&nbsp;&nbsp;&nbsp;&nbsp;￥：'
//            +image.price+'<img src="upload/cart.png" onclick="addItem('
//                +image.id+',\''+image.name+'\','+image.price+',\''+image.pic+'\')" alt="购物车" style="float:right;margin-top:-5px;cursor:pointer;"></div></div>';
//        }
//
//        // Add image HTML to the page.
//        $('#index-product-'+active_type).append(html);
//    };





    $(document).ready(new function() {
        //loadSlider();
        // Capture scroll event.
        // 注：官方的示例这里使用 $(document) 来绑定 scroll 事件是不支持 IE6-8 的，如需支持 IE6-8 请使用 $(window).bind('scroll', onScroll);
        //$(document).bind('scroll', onScroll);
        //$(window).bind('scroll', onScroll);

        // Load first data from the API.
        //loadData();
    });
</script>