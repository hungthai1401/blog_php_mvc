<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/15/2016
 * Time: 12:03 PM
 */
class Blogs extends Controller
{
    public function detail($blog_id)
    {
        $detail = $this->model->detailBlog($blog_id);
        $view = $this->model->getView($blog_id) + 1;
        $updateView = $this->model->updateView($blog_id, $view);
        $comments = $this->model->getCommentsByBlog($blog_id);
        $category_id = $this->model->getCategoryByBlog($blog_id);
        $related = $this->model->getRelatedPosts($category_id);

        if (isset($_POST["action"]) && $_POST["action"] == "comment") {
            $comment = $_POST["comment"];
            $blog_id = $_POST["blog_id"];
            $user_id = $_POST["user_id"];
            $reply_to = $_POST["reply_to"];
            $comment_id = $this->model->submitComment($comment, $user_id, $blog_id, $reply_to);
            $submitComment = $this->model->getCommentById($comment_id);
            die($submitComment);
        }

        require APP . "view/__templates/header.php";
        require APP . "view/detail.php";
        require APP . "view/__templates/footer.php";
    }
    public function music ()
    {
        $category_id = 2;
        $to = date("Y-m-d", strtotime('tomorrow'));
        $from = date_create($to);
        date_add($from, date_interval_create_from_date_string("-1 week"));
        $from = date_format($from, "Y-m-d");
        $popularBlogs = $this->model->gerPopularCate($from, $to, $category_id);

        $trang = $_GET['trang']; // lấy số trang hiện tại
        $totalPostsCate = $this->model->getBlogCate($category_id); // lấy users
        $so_post = count($totalPostsCate);
        $so_trang = ceil($so_post / 4);
        if ($so_post < 4 ) {
            $trang_hien_tai = 0;
            $so_trang = 1;
        }
        else {
            $trang_hien_tai = ($trang - 1)*4;
        }

        $row_music = $this->model->getCategory_blog($category_id, $trang_hien_tai,4);
        require APP . "view/__templates/header.php";
        require APP . "view/music.php";
        require APP . "view/__templates/footer.php";
    }

    public function fashion ()
    {
        $category_id = 3;

        $to = date("Y-m-d", strtotime('tomorrow'));
        $from = date_create($to);
        date_add($from, date_interval_create_from_date_string("-1 week"));
        $from = date_format($from, "Y-m-d");
        $popularBlogs = $this->model->gerPopularCate($from, $to, $category_id);


        $trang = $_GET['trang']; // lấy số trang hiện tại
        $totalPostsCate = $this->model->getBlogCate($category_id); // lấy users
        $so_post = count($totalPostsCate);
        $so_trang = ceil($so_post / 4);
        if ($so_post < 4 ) {
            $trang_hien_tai = 0;
            $so_trang = 1;
        }
        else {
            $trang_hien_tai = ($trang - 1)*4;
        }

        $row_fashion = $this->model->getCategory_blog($category_id, $trang_hien_tai,4);
        require APP . "view/__templates/header.php";
        require APP . "view/fashion.php";
        require APP . "view/__templates/footer.php";
    }
    public function travel ()
    {


        $category_id = 1;

        $to = date("Y-m-d", strtotime('tomorrow'));
        $from = date_create($to);
        date_add($from, date_interval_create_from_date_string("-1 week"));
        $from = date_format($from, "Y-m-d");
        $popularBlogs = $this->model->gerPopularCate($from, $to, $category_id);

        $trang = $_GET['trang']; // lấy số trang hiện tại
        $totalPostsCate = $this->model->getBlogCate($category_id); // lấy users
        $so_post = count($totalPostsCate);
        $so_trang = ceil($so_post / 4);
        if ($so_post < 4 ) {
            $trang_hien_tai = 0;
            $so_trang = 1;
        }
        else {
            $trang_hien_tai = ($trang - 1)*4;
        }

        $row_travel = $this->model->getCategory_blog($category_id, $trang_hien_tai,4);
        require APP . "view/__templates/header.php";
        require APP . "view/travel.php";
        require APP . "view/__templates/footer.php";
    }
}