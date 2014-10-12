<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);
/*
$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
); */
?>



<?php
    /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'tags',
		'status',
		'create_time',
		'update_time',
		'author_id',
	),
)); */
    ?>

<div class="container">
<div class="row" style="margin-top:30px">
<div class="col-md-8 blog-main">
<article class="blog-post">
    <header>
        <h1>My Insightful Article</h1>
        <div class="lead-image">
            <img src="images/tmp/hands.png" alt="Hands" class="img-responsive">
            <div class="meta clearfix">

                <div class="author">
                    <i class="peopleIcon"></i>
                    <span class="data">Alexander Rechsteiner</span>
                </div>
                <div class="date">
                    <i class="calendarIcon"></i>
                    <span class="data">26 July 2013</span>
                </div>
                <div class="comments">
                    <i class="commentsIcon"></i>
                    <span class="data"><a href="#comments">26 Comments</a></span>
                </div>
            </div>
        </div>
    </header>
    <div class="body">

        <p>Bacon ipsum dolor sit amet esse duis
            pastrami anim, pancetta fatback capicola officia tenderloin. Meatloaf
            culpa ut, bacon sed sausage jerky cillum est ham ad laboris ham hock
            dolore. Venison ut enim, aliqua elit frankfurter et incididunt consequat
            culpa nostrud in. Ground round venison commodo do capicola. Id commodo
            laborum proident nostrud cillum duis shoulder. Shank spare ribs
            pastrami, jowl jerky eiusmod proident tongue occaecat enim doner
            pancetta capicola t-bone.</p>

        <p>Id est labore, frankfurter sausage ex do
            dolore adipisicing aliquip shankle deserunt. Dolore culpa flank ad.
            Shankle pork loin chuck dolore short loin, pork sunt aliqua eiusmod
            brisket deserunt ut id. Id commodo laborum proident nostrud cillum duis
            shoulder. Shank spare ribs pastrami, jowl jerky eiusmod proident tongue
            occaecat enim doner pancetta capicola t-bone.</p>

        <p>Cillum beef ribs ullamco incididunt pork
            belly nostrud tail et reprehenderit mollit tempor shoulder. Leberkas
            brisket elit, short ribs ham beef ribs enim nostrud sunt sirloin. Do
            esse capicola shoulder, nostrud pig non officia ribeye in cillum. Nisi
            ham hock ex nulla laborum minim tempor beef, frankfurter velit. Ex spare
            ribs eiusmod do dolore adipisicing jowl beef ut. Aute proident pork
            chop capicola. Enim fatback meatball kielbasa esse. Id commodo laborum
            proident nostrud cillum duis shoulder. Shank spare ribs pastrami, jowl
            jerky eiusmod proident tongue occaecat enim doner pancetta capicola
            t-bone. Id commodo laborum proident nostrud cillum duis shoulder. Shank
            spare ribs pastrami, jowl jerky eiusmod proident tongue occaecat enim
            doner pancetta capicola t-bone.</p>

        <p>Capicola chuck in filet mignon prosciutto
            turkey. Ut tri-tip eiusmod pariatur. Ball tip drumstick fugiat bacon,
            ribeye reprehenderit dolore sausage beef kielbasa. Ex beef magna culpa
            labore swine venison pancetta eu irure meatball bresaola frankfurter
            exercitation.</p>

        <p>Aliqua fatback tenderloin ex biltong
            laborum minim ut swine bresaola exercitation. Beef corned beef short
            loin ea. Nulla ullamco eiusmod ball tip enim, ut turkey officia tail ut
            tenderloin id anim. Tri-tip chuck ham hock beef pancetta pork loin. Sint
            ham hock aliquip sausage. Excepteur incididunt ea, eu tongue filet
            mignon hamburger. Ut ea nostrud short loin.</p>

        <p>Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!</p>

    </div>
</article>

<!--
<aside class="social-icons clearfix">
    <a href="#" class="social-icon color-one">
        <div class="inner-circle"></div>
        <i class="icon-twitter"></i>
    </a>

    <a href="#" class="social-icon color-two">
        <div class="inner-circle"></div>
        <i class="icon-google-plus"></i>
    </a>

    <a href="#" class="social-icon color-three">
        <div class="inner-circle"></div>
        <i class="icon-facebook"></i>
    </a>
</aside>  -->
<div class="control-group">
    <label class="control-label"></label>
    <div class="controls">
        <button class="btn"  id="scBt" style="font-weight: 800;font-size: 15px;width:100px;height:50px;margin-left:80px;">收 藏</button>
        <button class="btn"  id="cscBt" style="font-weight: 800;font-size: 15px;width:100px;height:50px;margin-left:40px;">取消收藏</button>
    </div>
</div>

<aside class="comments" id="comments">
    <hr>

    <h2><i class="icon-comments"></i> 24 Comments</h2>

    <article class="comment">
        <header class="clearfix">
            <img src="images/user/avatar.png" alt="A Smart Guy" class="avatar">
            <div class="meta">
                <h3><a href="#">Willy Wonka</a></h3>
                                    <span class="date">
                                        27 July 2013
                                    </span>
                                    <span class="separator">
                                        -
                                    </span>

                <a href="#create-comment" class="reply-link">Reply</a>
            </div>
        </header>
        <div class="body">
            Lorem ipsum dolor sit amet, consectetur
            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut  liquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident.
        </div>
    </article>

    <article class="comment reply">
        <header class="clearfix">
            <img src="images/user/avatar.png" alt="A Smart Guy" class="avatar">
            <div class="meta">
                <h3><a href="#">Willy Wonka</a></h3>
                                    <span class="date">
                                        27 July 2013
                                    </span>
                                    <span class="separator">
                                        -
                                    </span>

                <a href="#create-comment" class="reply-link">Reply</a>
            </div>
        </header>
        <div class="body">
            Lorem ipsum dolor sit amet, consectetur
            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut  liquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident.
        </div>
    </article>

    <article class="comment ">
        <header class="clearfix">
            <img src="images/user/avatar.png" alt="A Smart Guy" class="avatar">
            <div class="meta">
                <h3><a href="#">Willy Wonka</a></h3>
                                    <span class="date">
                                        27 July 2013
                                    </span>
                                    <span class="separator">
                                        -
                                    </span>

                <a href="#create-comment" class="reply-link">Reply</a>
            </div>
        </header>
        <div class="body">
            Lorem ipsum dolor sit amet, consectetur
            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut  liquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident.
        </div>
    </article>

    <article class="comment">
        <header class="clearfix">
            <img src="images/user/avatar.png" alt="A Smart Guy" class="avatar">
            <div class="meta">
                <h3><a href="#">Willy Wonka</a></h3>
                                    <span class="date">
                                        27 July 2013
                                    </span>
                                    <span class="separator">
                                        -
                                    </span>

                <a href="#create-comment" class="reply-link">Reply</a>
            </div>
        </header>
        <div class="body">
            Lorem ipsum dolor sit amet, consectetur
            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut  liquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident.
        </div>
    </article>
</aside>

<aside class="create-comment" id="create-comment">
    <hr>

    <h2><i class="icon-heart"></i> 添加评论</h2>

    <form action="#" method="get" accept-charset="utf-8">
        <!--
        <div class="row">
            <div class="col-md-6">
                <input name="name" id="comment-name" placeholder="Name" class="form-control input-lg" type="text">
            </div>
            <div class="col-md-6">
                <input name="email" id="comment-email" placeholder="Email" class="form-control input-lg" type="email">
            </div>
        </div>

        <input name="name" id="comment-url" placeholder="Website" class="form-control input-lg" type="url">
        -->
        <textarea rows="10" name="message" id="comment-body" placeholder="评论前请先登录..." class="form-control input-lg"></textarea>

        <div class="buttons clearfix">
            <button class="btn btn-xlarge btn-tales-two">取消</button>
            <button type="submit" class="btn btn-xlarge btn-tales-one">提交</button>
        </div>
    </form>
</aside>
</div>
<aside class="col-md-4 blog-aside">

    <div class="aside-widget">
        <header>
            <h3>Read next...</h3>
        </header>
        <div class="body">
            <ul class="tales-list">
                <li><a href="http://demo.hackerthemes.com/tales/html-version/v2/index.html">Email Encryption Explained</a></li>
                <li><a href="#">Selling is a Function of Design.</a></li>
                <li><a href="#">It’s Hard To Come Up With Dummy Titles</a></li>
                <li><a href="#">Why the Internet is Full of Cats</a></li>
                <li><a href="#">Last Made-Up Headline, I Swear!</a></li>
            </ul>
        </div>
    </div>

    <div class="aside-widget">
        <header>
            <h3>Authors Favorites</h3>
        </header>
        <div class="body">
            <ul class="tales-list">
                <li><a href="http://demo.hackerthemes.com/tales/html-version/v2/index.html">Email Encryption Explained</a></li>
                <li><a href="#">Selling is a Function of Design.</a></li>
                <li><a href="#">It’s Hard To Come Up With Dummy Titles</a></li>
                <li><a href="#">Why the Internet is Full of Cats</a></li>
                <li><a href="#">Last Made-Up Headline, I Swear!</a></li>
            </ul>
        </div>
    </div>

    <div class="aside-widget">
        <header>
            <h3>Tags</h3>
        </header>
        <div class="body clearfix">
            <ul class="tags">
                <li><a href="#">OpenPGP</a></li>
                <li><a href="#">Django</a></li>
                <li><a href="#">Bitcoin</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">GNU/Linux</a></li>
                <li><a href="#">Git</a></li>
                <li><a href="#">Homebrew</a></li>
                <li><a href="#">Debian</a></li>
            </ul>
        </div>
    </div>
</aside>
</div>
</div>