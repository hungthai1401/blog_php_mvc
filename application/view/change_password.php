<section class="container-fluid">
    <div class="row">
        <aside class="main-sidebar"
               style=" width:30%;position: absolute; top: 0;left: 4%;width: 230px;z-index: 810; margin-top: 250px; height: 500px;background-color: white ">
            <div class="icon" style="padding: 20px">
                <img src="/<?php echo $profile['avatar'] ?>"
                     style="width: 70px; height: 70px; border-radius: 50%; margin: auto auto; margin-bottom: 20px"
                     class="img-responsive">
                <h3 style="text-align: center"><?php echo $profile['username'] ?></h3>
            </div>
            <ul class="sidebar-menu list-group">
                <li class="list-group-item" style="border: 0px; border-top: 1px dotted gainsboro">
                    <a href="/profile">Thông tin chung</a>
                </li>
                <div class="clearfix"></div>
                <li class="list-group-item" style="border: 0px;  border-top: 1px dotted gainsboro">
                    <a href="/profile/change">Thay đổi mật khẩu</a>
                </li>
                <div class="clearfix"></div>
                <li class="list-group-item" style="border: 0px;  border-top: 1px dotted gainsboro">
                    <a>Tin nhắn</a>
                </li>

            </ul>
        </aside>

        <div class="content_profile"
             style="width: 70%; float: right; height: 500px; border: 1px solid gainsboro; margin-right: 5%; padding: 40px 40px; background-color: white">
            <div class="content_chitiet">
                <form class="form-horizontal" method="post" action="http://localhost/blog-mvc/profile/change">
                    <p id="error" style="text-align: center; color: #7d0000; padding-bottom: 25px;">
                        <?php
                        if (isset($_SESSION["error"])) {
                            echo $_SESSION["error"];
                        }
                        ?>
                    </p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="padding-top: 5px">Mật khẩu hiện tại</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" value="" id="old-password-edit" name="old-password-edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="padding-top: 5px">Mật khẩu mới</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" value="" name="new-password-edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="padding-top: 5px">Xác nhận mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" value="" name="confirm-new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="btn-change-password" style="display: block;margin: 0 auto">Lưu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
