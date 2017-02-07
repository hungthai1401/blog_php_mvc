<?php

require APP . "libs/Validation.php";

class Home extends Controller
{

    public function index()
    {
        $travel = $this->model->getHome(1, 1);
        $music = $this->model->getHome(2, 2);
        $fashion = $this->model->getHome(3, 3);

        $to = date("Y-m-d", strtotime('tomorrow'));
        $from = date_create($to);
        date_add($from, date_interval_create_from_date_string("-1 week"));
        $from = date_format($from, "Y-m-d");
        $popularBlogs = $this->model->getPopularBlogs($from, $to);
        //load view
        require APP . "view/__templates/header.php";
        require APP . "view/index.php";
        require APP . "view/__templates/footer.php";
    }

    public function login()
    {
        if (isset($_POST['action']) == "login") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = $this->model->login($username);
            if ($login > 0) {
                if (password_verify($password, $login["password"])) {
                    $_SESSION['login'] = 1;
                    $_SESSION['username'] = $login['username'];
                    $_SESSION['id_user'] = $login['user_id'];
                    $success = array("error" => false, "message" => "");
                    echo json_encode($success);
                } else {
                    $error = array("error" => true, "message" => "Mật khẩu sai rồi nhé con!");
                    die(json_encode($error));
                }
            } else {
                $error = array("error" => true, "message" => "Đếch có nhé");
                die(json_encode($error));
            }
        }
    }

    public function register()
    {
        if (isset($_POST['action']) == "register") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $error = array();
            $isValid = 0;

            if (!Validation::isValidUser($username)) {
                array_push($error, "Sai định dạng tên đăng nhập rồi nhé!");
                $isValid = 1;
            }
            if (!Validation::isValidPass($password)) {
                array_push($error, "Sai định dạng mật khẩu rồi nhé!");
                $isValid = 1;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "sai định dạng email rồi nhé!");
                $isValid = 1;
            }
            $check = $this->model->check_user($username);
            if ($check > 0) {
                array_push($error, "Tài khoản đã tồn tại rồi nhé!");
                $isValid = 1;
            } else {
                if ($isValid == 0) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $this->model->register($username, $email, $password);
                    $_SESSION['login'] = 1;
                    $_SESSION['name'] = $username;
                    $success = array("error" => false, "message" => "");
                    echo json_encode($success);

                    require APP . "libs/PHPMailer/PHPMailerAutoload.php";

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

                    $mail->Subject = 'Thành công rồi nhé';
                    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if (!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
//                    echo 'Message has been sent';
                    }
                }
            }
            if ($isValid == 1) {
                die(json_encode($error));
            }
        }
    }


    public function logout()
    {
        if (isset($_POST['action']) == "logout") {
            unset($_SESSION['login']);
            unset($_SESSION['username']);
            unset($_SESSION['id_user']);
            header('location:' . URL);
        }
    }
//    public function search_btn ()
//    {
//        if (isset($_POST['action']) == "search") {
//            $term = trim($_POST['search']);
//            $list_title = $this->model->search($term);;
//
//
//            echo json_encode($list_title);
//        }
//    }
    public function search ()
    {
        if (isset($_POST['action']) == "search") {
            $term = trim($_POST['search']);
            $list_title = $this->model->search($term);;

            if ($list_title != ""){
                echo json_encode($list_title);
            }
            else {
                echo "không có kết quả";
            }
        }
    }
}