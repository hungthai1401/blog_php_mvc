<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/12/2016
 * Time: 4:14 PM
 */
class Users extends Controller
{
    public function index ()
    {
        if ($_SESSION['id_group'] == 1) {
            $table = "users";
            $trang = $_GET['trang']; // lấy số trang hiện tại
            $load_users = $this->model->getUsers(); // lấy users
            $so_users = count($load_users); // đếm số user
            $so_trang = ceil($so_users / 4);
            if ($so_users < 4 ) {
                $trang_hien_tai = 0;
                $so_trang = 1;
            }
            else {
                $trang_hien_tai = ($trang - 1)*4;
            }
            $load_view_user = $this->model->phanTrang($table,$trang_hien_tai,4);
            require APP . "view/admin/__templates/header.php";
            require APP . "view/admin/__templates/sidebar.php";
            require APP . "view/admin/users.php";
            require APP . "view/admin/__templates/footer.php";
        } else {
            header("location:" .URL);
        }

    }

    public function phanTrang ()
    {
        $users = $this->model->phanTrang();
        var_dump($users);
    }

    public function newUsers()
    {
        if (isset($_POST['save_user'])) {
            $path = "images/user/";
            $username = $_POST['user'];
            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $avatar = "public/images/user/".$_FILES['avatar']['name'];
            $id_group = $_POST['id_group'];

            if ($this->model->insertUser($username, $password, $email, $avatar, $id_group)) {
                move_uploaded_file($_FILES['avatar']['tmp_name'], $path . $_FILES['avatar']['name']);
                header("location:" . URL . "users?trang=1");
            }
        }
    }

    public function edit_user($user_id)
    {
        $user = $this->model->getUserById($user_id);

        if (isset($_POST["name"]) && $_POST["name"] === "rule") {
            $newRule = $_POST["value"];
            $edit = $this->model->editUser($user_id, $newRule);
            echo $edit;
        } else {
            echo "abc";
        }
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/edit_user.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function delete()
    {
        if (isset($_POST['action']) == "delete") {
            $id_user = $_POST['id'];
            if ($this->model->delete($id_user)) {
                echo "delete_thanhcong";
            }
        }
    }
}