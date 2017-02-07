<section class="container-fluid">
    <div class="row">
        <div class="content_profile">
            <div class="content_chitiet">
                <form class="form-horizontal" method="post" action="http://localhost/blog-mvc/reset/change">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="password" name="new-password-reset" id="new-password-reset" class="form-control" value="" title="" required="required" placeholder="Mật khẩu mới" style="margin-bottom: 20px;">
                            <input type="password" name="confirm-password-reset" id="confirm-password-reset" class="form-control" value="" title="" required="required" placeholder="Xác nhận mật khẩu" style="margin-bottom: 20px;">
                            <input type="submit" name="submit-reset-password" id="submit-reset-password" class="btn btn-primary" value="Gửi yêu cầu" title="" required="required" style="margin-bottom: 20px;">
                            <p id="notication">
                                <?php
                                if (isset($_SESSION["error"])) {
                                    echo $_SESSION["error"];
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>