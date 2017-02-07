<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="agileinfo">

                <h2 class="w3">SINGLE PAGE</h2>
                <div class="single">
                    <img src="<?php echo URL ?><?php echo $detail["image"] ?>" class="img-responsive" alt="">
                    <div class="b-bottom">
                        <h5 class="top"><?php echo $detail["title"] ?></h5>
                        <p class="sub"><?php echo $detail["content"] ?></p>
                        <p><?php echo $detail["created_at"] ?><a class="span_link" href="#"><span
                                    class="glyphicon glyphicon-comment"></span><?php echo $detail["total_comments"] ?>
                            </a><a class="span_link" href="#"><span
                                    class="glyphicon glyphicon-eye-open"></span><?php echo $detail["views"] ?> </a>
                        </p>

                    </div>
                </div>


                <div class="response comment-detail">
                    <h4>Comments</h4>
                    <?php
                    foreach ($comments as $comments) {
                        if ($comments["reply_to"] == 0) {
                            ?>
                            <div class="media response-info comment-detail-<?php echo $comments["user_id"] ?>">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img src="<?php echo URL ?><?php echo $comments["avatar"] ?>"
                                             class="img-responsive"
                                             alt="">
                                    </a>
                                </div>
                                <div class="media-body response-text-right">
                                    <p><?php echo $comments["comment"] ?></p>
                                    <ul>
                                        <li><?php echo $comments["created_at"] ?></li>
                                        <li><a href="javascript:void(0)"
                                               onclick="getReplyTo(<?php echo $comments["user_id"] ?>, '<?php echo $comments["username"] ?>')">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="media response-info comment-reply-<?php echo $comments["reply_to"] ?>">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img src="<?php echo URL ?><?php echo $comments["avatar"] ?>"
                                             class="img-responsive"
                                             alt="">
                                    </a>
                                </div>
                                <div class="media-body response-text-right">
                                    <strong>Answers</strong>
                                    <p><?php echo $comments["comment"] ?></p>
                                    <ul>
                                        <li><?php echo $comments["created_at"] ?></li>
                                        <li><a href="javascript:void(0)"
                                               onclick="getReplyTo(<?php echo $comments["user_id"] ?>, '<?php echo $comments["username"] ?>')">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="coment-form">
                    <h4>Leave your comment</h4>
                    <input type="hidden" value="<?php echo $detail["blog_id"] ?>" id="blog-id-cm">
                    <input type="hidden" value="<?php echo $_SESSION["id_user"] ?>" id="user-id-cm">
                    <input type="hidden" id="reply_to_username" value="">
                    <?php
                    if (isset($_SESSION["login"])) {
                        ?>
                        <form action="#" method="post">
                            <input type="text" value="To" name="reply_to" id="reply_to" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Name';}" required=""
                                   style="display: none">
                            <!--                            <input type="email" value="Email" name="email" onfocus="this.value = '';"-->
                            <!--                                   onblur="if (this.value == '') {this.value = 'Email';}" required="">-->
                            <!--                            <input type="text" value="Website" name="websie" onfocus="this.value = '';"-->
                            <!--                                   onblur="if (this.value == '') {this.value = 'Website';}" required="">-->
                            <textarea onfocus="this.value = '';"
                                      onblur="if (this.value == '') {this.value = 'Your Comment...';}" required=""
                                      id="comment-detail">Your Comment...</textarea>
                            <input type="button" value="Submit Comment"
                                   onclick="submitComment(<?php echo $detail["blog_id"] ?>, <?php echo $_SESSION["id_user"] ?>)">
                        </form>
                        <?php
                    } else {
                        ?>
                        <input type="button" value="Sign In">
                        <?php
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">


            <div class="blo-top1">

                <div class="tech-btm">
                    <div class="search-1">
                        <form action="#" method="post">
                            <input type="search" name="Search" value="Search" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Search';}" required="">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                    <h4>Related Posts </h4>
                    <?php
                    foreach ($related as $related) {
                        ?>
                        <div class="blog-grids">
                            <div class="blog-grid-left">
                                <a href="<?php echo URL ?>blogs/detail/<?php echo $related["blog_id"] ?>"><img src="<?php echo URL ?><?php echo $related["image"]?>" class="img-responsive" alt=""></a>
                            </div>
                            <div class="blog-grid-right">

                                <h5><a href="<?php echo URL ?>blogs/detail/<?php echo $related["blog_id"] ?>"><?php echo $related["title"]?></a></h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="insta">
                        <h4>Instagram</h4>
                        <ul>

                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t1.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m1.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f1.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m2.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f2.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t2.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/f3.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/t3.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
                            <li><a href="singlepage.html"><img src="<?php echo URL ?>images/m3.jpg"
                                                               class="img-responsive" alt=""></a>
                            </li>
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
                            }(document, 'script', 'twitter-wjs');</script>
                    </div>
                </div>


            </div>


        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>