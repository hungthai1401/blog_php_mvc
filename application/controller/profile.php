<?php

require APP . "libs/Validation.php";

class profile extends Controller {

    public function index ()
    {
        $user_id = $_SESSION['id_user'];
        $profile = $this->model->profile($user_id);
        if (isset($_POST["name"]) && $_POST["name"] === "email_edit") {
            $newEmail = $_POST["value"];
            $edit = $this->model->updateProfile($user_id, "email_edit", $newEmail, '');
            echo $edit;
        } elseif (isset($_POST["name"]) && $_POST["name"] === "description_edit") {
            $newDescription = $_POST["value"];
            $edit = $this->model->updateProfile($user_id, "description_edit", "", $newDescription);
            echo $edit;
        }
        require APP . "view/__templates/header.php";
        require APP . "view/profile.php";
        require APP . "view/__templates/footer.php";
    }

    public function update_ava ()
    {
        if(isset($_POST['new_avatar']))
        {
            $path = 'images/user/';
            $file_name = "public/images/user/".$_FILES['avatar_new']['name'];
            $id_user = $_SESSION['id_user'];
            if ($this->model->updateAva($id_user, $file_name)){
                move_uploaded_file($_FILES['avatar_new']['tmp_name'], $path.$_FILES['avatar_new']['name']);
                header("Location: " . URL ."profile");
            }
        }
    }

    public function change()
    {
        if (isset($_SESSION["login"])) {
            $user_id = $_SESSION['id_user'];
            $profile = $this->model->profile($user_id);
            if (isset($_POST["btn-change-password"])) {
                $oldPassword = $_POST["old-password-edit"];
                $newPassword = $_POST["new-password-edit"];
                $confirm = $_POST["confirm-new-password"];
                if (!Validation::isValidPass($oldPassword) || !Validation::isValidPass($newPassword) || !Validation::isValidPass($confirm)) {
                    $_SESSION["error"] = "Sai định dạng mật khẩu!";
                }
                elseif (!password_verify($oldPassword, $profile["password"])) {
                    $_SESSION["error"] = "Mật khẩu hiện tại không đúng!";
                } elseif ($newPassword != $confirm) {
                    $_SESSION["error"] = "Mật khẩu mới và xác nhận không trùng nhau!";
                } else {
                    if($this->model->updatePassword($user_id, password_hash($newPassword, PASSWORD_DEFAULT))) {
                        header("Location: " . URL);
                        unset($_SESSION["login"]);
                    } else {
                        $_SESSION["error"] = "Sai ở đâu rồi thì phải!";
                    }
                }
            }
        } else {
            header("Location: " . URL);
        }
        require APP . "view/__templates/header.php";
        require APP . "view/change_password.php";
        require APP . "view/__templates/footer.php";
    }
}