<div class="banner"></div>
<div class="services w3l wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab"
                                                              data-toggle="tab" aria-controls="expeditions"
                                                              aria-expanded="true">FASHION</a></li>
                    <li role="presentation" class=""><a href="#safari" role="tab" id="safari-tab" data-toggle="tab"
                                                        aria-controls="safari">TRAVEL</a></li>
                    <li role="presentation" class=""><a href="#trekking" role="tab" id="trekking-tab" data-toggle="tab"
                                                        aria-controls="trekking">MUSIC</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="expeditions" aria-labelledby="expeditions-tab">

                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/f2.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/f4.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/f3.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="safari" aria-labelledby="safari-tab">
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/t1.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/t2.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/t3.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade active in" id="trekking" aria-labelledby="trekking-tab">

                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/m2.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/m1.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="col-md-4 col-sm-5 tab-image">
                            <img src="images/m3.jpg" class="img-responsive" alt="Wanderer">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->

                <div class="tc-ch wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">

                    <div class="tch-img">
                        <a href="blogs/detail/<?php echo $travel["blog_id"] ?>"><img
                                    src="<?php echo $travel["image"] ?>"
                                    class="img-responsive" alt="" style="width: 750px"></a>
                    </div>

                    <h3>
                        <a href="blogs/detail/<?php echo $travel["blog_id"] ?>"><?php echo $travel["title"] ?></a>
                    </h3>
                    <h6>BY
                        <a href="blogs/detail/<?php echo $travel["blog_id"] ?>"><?php echo $travel["username"] ?> </a><?php echo $travel["created_at"] ?>
                        IN <a href="blogs/travel?trang=1"><?php echo $travel["name_category"] ?> </a>
                    </h6>
                    <p><?php echo $travel["description"] ?></p>
                    <div class="bht1">
                        <a href="blogs/detail/<?php echo $travel["blog_id"] ?>">Read More</a>
                    </div>
                    <div class="soci">
                        <ul>
                            <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                            <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                            <li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
                            <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                            <li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <!-- technology-top -->
                <!-- technology-top -->
                <div class="w3ls">
                    <?php
                    foreach ($music as $music) {
                        ?>
                        <div class="col-md-6 w3ls-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="tc-ch">
                                <div class="tch-img">
                                    <a href="blogs/detail/<?php echo $music["blog_id"] ?>">
                                        <img src="<?php echo $music["image"] ?>"
                                             class="img-responsive" alt="" style="width: 300px; height: 200px;"></a>
                                </div>
                                <div class="title-blog" style="height: 100px">
                                    <h3>
                                        <a href="blogs/detail/<?php echo $music["blog_id"] ?>"><?php echo $music["title"] ?></a>
                                    </h3>
                                </div>
                                <h6>BY
                                    <a href="blogs/detail/<?php echo $music["blog_id"] ?>"><?php echo $music["username"] ?> </a><?php echo $music["created_at"] ?>
                                    IN <a href="blogs/music?trang=1"><?php echo $music["name_category"] ?> </a>
                                </h6>
                                <p><?php echo $music["description"] ?></p>
                                <div class="bht1">
                                    <a href="blogs/detail/<?php echo $music["blog_id"] ?>">Read
                                        More</a>
                                </div>
                                <div class="soci">
                                    <ul>
                                        <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="clearfix"></div>
                </div>
                <!-- technology-top -->
                <?php
                foreach ($fashion as $fashion) {
                    ?>
                    <div class="wthree">
                        <div class="col-md-6 wthree-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="tch-img">
                                <a href="blogs/detail/<?php echo $fashion["blog_id"] ?>"><img
                                            src="<?php echo $fashion["image"] ?>"
                                            class="img-responsive"
                                            alt="" style="width: 300px; height: 200px;"></a>
                            </div>
                        </div>
                        <div class="col-md-6 wthree-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <h3>
                                <a href="blogs/detail/<?php echo $fashion["blog_id"] ?>"><?php echo $fashion["title"] ?></a>
                            </h3>
                            <h6>BY
                                <a href="/blogs/detail/<?php echo $fashion["blog_id"] ?>"><?php echo $fashion["username"] ?> </a><?php echo $fashion["created_at"] ?>
                                IN <a href="/blogs/fashion?trang=1"><?php echo $fashion["name_category"] ?> </a></h6>
                            <p><?php echo $fashion["description"] ?></p>
                            <div class="bht1">
                                <a href="blogs/detail/<?php echo $fashion["blog_id"] ?>">Read More</a>
                            </div>
                            <div class="soci">
                                <ul>

                                    <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                                    <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">


            <div class="blo-top1">

                <div class="tech-btm">
                    <div class="search-1 wow fadeInDown" id="search_home" data-wow-duration=".8s" data-wow-delay=".2s">
                        <form>
                            <input id="search" type="search" name="Search" required="" placeholder="Search">
                        </form>
                    </div>
                    <div class="results_search">
                        <ul id="results_search"></ul>
                    </div>
                    <h4>Popular Posts </h4>
                    <?php
                    foreach ($popularBlogs as $popularBlogs) {
                        ?>
                        <div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="blog-grid-left">
                                <a href="/blogs/detail/<?php echo $popularBlogs["blog_id"] ?>"><img
                                            src="/<?php echo $popularBlogs["image"] ?>"
                                            class="img-responsive"
                                            alt=""></a>
                            </div>
                            <div class="blog-grid-right">

                                <h5>
                                    <a href="/blogs/detail/<?php echo $popularBlogs["blog_id"] ?>"><?php echo $popularBlogs["title"] ?></a>
                                </h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="insta wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                        <h4>Instagram</h4>
                        <ul>

                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t1.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m1.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f1.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m2.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f2.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t2.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f3.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t3.jpg"
                                                               class="img-responsive" alt=""></a></li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m3.jpg"
                                                               class="img-responsive" alt=""></a></li>
                        </ul>
                    </div>

                    <p>Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur, at
                        pro</p>
                    <div class="twt">

                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true"
                                class="twitter-hashtag-button twitter-hashtag-button-rendered twitter-tweet-button"
                                title="Twitter Tweet Button"
                                src="https://platform.twitter.com/widgets/tweet_button.b7de008f493a5185d8df1aedd62d77c6.en.html#button_hashtag=TwitterStories&amp;dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=https%3A%2F%2Fp.w3layouts.com%2Fdemos%2Fduplex%2Fweb%2F&amp;size=l&amp;time=1467721486626&amp;type=hashtag"
                                style="position: static; visibility: visible; width: 166px; height: 28px;"
                                data-hashtag="TwitterStories"></iframe>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + '://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, 'script', 'twitter-wjs');
                        </script>
                    </div>
                </div>


            </div>


        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>

<style>
    .overlay-loader {
        display: none;
        margin: auto;
        width: 97px;
        height: 97px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    .loader {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 97px;
        height: 97px;
        animation-name: rotateAnim;
        -o-animation-name: rotateAnim;
        -ms-animation-name: rotateAnim;
        -webkit-animation-name: rotateAnim;
        -moz-animation-name: rotateAnim;
        animation-duration: 0.4s;
        -o-animation-duration: 0.4s;
        -ms-animation-duration: 0.4s;
        -webkit-animation-duration: 0.4s;
        -moz-animation-duration: 0.4s;
        animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        -ms-animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-timing-function: linear;
        -o-animation-timing-function: linear;
        -ms-animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }

    .loader div {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: 1px solid rgb(0, 0, 0);
        position: absolute;
        top: 2px;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }

    .loader div:nth-child(odd) {
        border-top: none;
        border-left: none;
    }

    .loader div:nth-child(even) {
        border-bottom: none;
        border-right: none;
    }

    .loader div:nth-child(2) {
        border-width: 2px;
        left: 0px;
        top: -4px;
        width: 12px;
        height: 12px;
    }

    .loader div:nth-child(3) {
        border-width: 2px;
        left: -1px;
        top: 3px;
        width: 18px;
        height: 18px;
    }

    .loader div:nth-child(4) {
        border-width: 3px;
        left: -1px;
        top: -4px;
        width: 23px;
        height: 23px;
    }

    .loader div:nth-child(5) {
        border-width: 3px;
        left: -1px;
        top: 4px;
        width: 31px;
        height: 31px;
    }

    .loader div:nth-child(6) {
        border-width: 4px;
        left: 0px;
        top: -4px;
        width: 39px;
        height: 39px;
    }

    .loader div:nth-child(7) {
        border-width: 4px;
        left: 0px;
        top: 6px;
        width: 49px;
        height: 49px;
    }

    @keyframes rotateAnim {
        from {
            transform: rotate(360deg);
        }
        to {
            transform: rotate(0deg);
        }
    }

    @-o-keyframes rotateAnim {
        from {
            -o-transform: rotate(360deg);
        }
        to {
            -o-transform: rotate(0deg);
        }
    }

    @-ms-keyframes rotateAnim {
        from {
            -ms-transform: rotate(360deg);
        }
        to {
            -ms-transform: rotate(0deg);
        }
    }

    @-webkit-keyframes rotateAnim {
        from {
            -webkit-transform: rotate(360deg);
        }
        to {
            -webkit-transform: rotate(0deg);
        }
    }

    @-moz-keyframes rotateAnim {
        from {
            -moz-transform: rotate(360deg);
        }
        to {
            -moz-transform: rotate(0deg);
        }
    }
</style>