<?php

require APP . "libs/PHPMailer/PHPMailerAutoload.php";
require APP . "libs/Validation.php";

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/19/2016
 * Time: 9:42 AM
 */
class Reset extends Controller
{
    public function index()
    {
        if (isset($_POST["action"]) && $_POST["action"] == "reset") {
            $email = $_POST["email"];
            $token = md5($email);
            $checkEmail = $this->model->checkEmail($email);
            if ($checkEmail == 0) {
                $error = array(
                    "error" => true,
                    "message" => "Email không tồn tại!"
                );
                die(json_encode($error));
            } else {
                $error = array(
                    "error" => false,
                    "message" => "Đã gửi mã xác nhận đến email này!"
                );

                $_SESSION["user_id"] = $checkEmail["user_id"];

                $mail = new PHPMailer;

                $mail->SMTPDebug = 0;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->CharSet = "UTF-8";
                $mail->Host = 'mailtrap.io';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '3d096ec81f4797';                 // SMTP username
                $mail->Password = '28b53de9a8c493';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to

                $mail->setFrom('abc@gmail.com', 'Mailer');
                $mail->addAddress($email, 'MHT');     // Add a recipient

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Xác nhận thiết lập lại mật khẩu';
                $mail->Body = 'Click vào <a href="'.URL.'verify?token='.$token.'&email='.$email.'">đây</a> để thay đổi password';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
//                    echo 'Message has been sent';
                }
                die(json_encode($error));
            }
        }
        require APP . "view/__templates/header.php";
        require APP . "view/reset.php";
        require APP . "view/__templates/footer.php";
    }

    public function change()
    {
        if (isset($_SESSION["reset"])) {
            $user_id = $_SESSION["user_id"];
            if (isset($_POST["submit-reset-password"])) {
                $password = $_POST["new-password-reset"];
                $confirm = $_POST["confirm-password-reset"];
                if (!Validation::isValidUser($password) || !Validation::isValidUser($confirm)) {
                    $_SESSION["error"] = "Sai định dạng mật khẩu";
                } elseif ($password != $confirm) {
                    $_SESSION["error"] = "Password và Confirm không trùng nhau";
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $update = $this->model->updatePassword($user_id, $hash);
                    if ($update) {
                        header("Location:" . URL);
                    } else {
                        $_SESSION["error"] = "Sai ở đâu đó rồi!";
                    }
                }
            }
        } else {
            header("Location:" . URL);
        }
        require APP . "view/__templates/header.php";
        require APP . "view/change.php";
        require APP . "view/__templates/footer.php";
    }
}