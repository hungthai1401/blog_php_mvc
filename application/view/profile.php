<section class="container-fluid">
    <div class="row">
    <aside class="main-sidebar" style=" width:30%;position: absolute; top: 0;left: 4%;width: 230px;z-index: 810; margin-top: 250px; height: 500px;background-color: white ">
        <div class="icon" style="padding: 20px">
            <img src="<?php echo $profile['avatar']?>" style="width: 70px; height: 70px; border-radius: 50%; margin: auto auto; margin-bottom: 20px" class="img-responsive" >
            <h3 style="text-align: center"><?php echo $profile['username']?></h3>
        </div>
        <ul class="sidebar-menu list-group">
            <li class="list-group-item" style="border: 0px; border-top: 1px dotted gainsboro">
               <a href="/profile">Thông tin chung</a>
            </li>
            <div class="clearfix"></div>
            <li class="list-group-item"  style="border: 0px;  border-top: 1px dotted gainsboro">
                <a href="/profile/change">Thay đổi mật khẩu</a>
            </li>
            <div class="clearfix"></div>
            <li class="list-group-item"  style="border: 0px;  border-top: 1px dotted gainsboro">
                <a>Tin nhắn</a>
            </li>

        </ul>
    </aside>

    <div class="content_profile" style="width: 70%; float: right; height: 500px; border: 1px solid gainsboro; margin-right: 5%; padding: 40px 40px; background-color: white">
        <div class="content_chitiet">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" style="padding-top: 50px">Avatar</label>
                    <div class="col-md-10" style="text-align: center">
                        <img src="<?php echo $profile['avatar']?>" style="max-height: 200px; max-width: 200px; margin-bottom: 20px"></br>
                        <a></a>
                        <input type="button" class="btn btn-primary" value="Đổi Avatar" data-toggle="modal" data-target="#myModal_avatar">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" style="padding-top: 5px">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $profile['username'] ?>" id="username-edit" name="username" disabled>
                        <input type="hidden" class="form-control" value="<?php echo $_SESSION['id_user'] ?>" id="user_id_edit" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" style="padding-top: 5px">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" value="<?php echo $profile['password'] ?>" name="password" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" style="padding-top: 5px">Email</label>
                    <div class="col-sm-10">
                        <a href="#" id="email-edit"><?php echo $profile['email'] ?></a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" style="padding-top: 5px">Mô tả</label>
                    <div class="col-sm-10">
                        <a href="#" id="description-edit"><?php echo $profile['description'] ?></a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    <div class="modal fade" id="myModal_avatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="http://localhost/blog-mvc/profile/update_ava" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Thay Avatar nhé</h4>
                    </div>
                    <div class="modal-body">
                        <input type="file" id="avatar_new" name="avatar_new">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="new_avatar">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
