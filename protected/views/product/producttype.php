<div class="span3">
    <div class="sidebar-nav">
        <div class="base" style="margin-top: 50px;">
            <?php
            foreach($topTypeArr as $tp){
                ?>
                <ul class="nav nav-list">
                    <li class="active" >
                        <a href="#">
                            <div class="fs1" aria-hidden="true" data-icon=""></div>
                            <?php echo $tp->value;?>
                        </a>
                    </li>

                    <?php
                    $arr = $topType[$tp->code];
                    foreach($arr as $type){
                        ?>
                        <li>
                            <a href="?r=product/typeView&type=<?php echo $type->code?>">
                                <?php echo $type->value?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <br>
            <?php
            }
            ?>

            <!--                <ul class="nav nav-list">-->
            <!---->
            <!--                    <li class="active">-->
            <!--                        <a href="#">-->
            <!--                            <div class="fs1" aria-hidden="true" data-icon=""></div>-->
            <!--                            休闲美食-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">薯片</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">饼干</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">瓜子飘香</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">泡面</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">美味饮品</a></li>-->
            <!--                    <li class="divider"></li>-->
            <!--                </ul>-->
            <!---->
            <!--                <ul class="nav nav-list">-->
            <!--                    <li  class="active">-->
            <!--                        <a href="http://wbpreview.com/previews/WB03K48SB/#">-->
            <!--                            <div class="fs1" aria-hidden="true" data-icon=""></div>-->
            <!--                            生活必备-->
            <!--                        </a>-->
            <!--                    <li >-->
            <!--                        <a href="http://wbpreview.com/previews/WB03K48SB/#">-->
            <!--                            干燥剂-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">暖宝贴</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">牙膏牙刷</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">面膜</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">围巾</a></li>-->
            <!--                    <li><a href="http://wbpreview.com/previews/WB03K48SB/#">腰带</a></li>-->
            <!--                    <li class="divider"></li>-->
            <!---->
            <!--                </ul>-->
        </div>
        <hr>
    </div>
</div>