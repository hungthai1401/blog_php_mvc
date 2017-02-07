<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    // login

    function login ($name)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":username" => $name,
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function check_user($namerg)
    {
        $sql = "SELECT * FROM users WHERE username = :namerg";
        try {
            $query = $this->db->prepare($sql);
            $paramerers = array(
                ":namerg" => $namerg
            );
            $query->execute($paramerers);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    function register ($name, $email, $pass)
    {
        $sql = "INSERT INTO users ( username, password, email, avatar ) VALUES (:username, :password, :email, :avatar)";
        try{
            $query = $this->db->prepare($sql);
            $paramerers = array(
                ":username" => $name,
                ":password" => $pass,
                ":email" => $email,
                ":avatar" => "anonymous.png"
            );
            $query->execute($paramerers);
            $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getHome($id_cate, $limit)
    {
        $sql = "SELECT a.*, b.name_category, c.username FROM blogs a INNER JOIN categories b ON a.category_id = b.category_id INNER JOIN users c ON c.user_id = a.user_id  WHERE a.category_id = $id_cate ORDER BY a.blog_id DESC LIMIT $limit";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            if ($limit == 1) {
                return $query->fetch(PDO::FETCH_ASSOC);
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPopularBlogs($from, $to)
    {
        $sql = "SELECT * FROM blogs WHERE created_at BETWEEN '$from' AND '$to' ORDER BY views DESC LIMIT 5";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function gerPopularCate($from, $to, $catecory_id)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $catecory_id AND created_at BETWEEN '$from' AND '$to' ORDER BY views DESC LIMIT 5";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function detailBlog($blog_id)
    {
        $sql = "SELECT a.*, COUNT(b.comment_id) total_comments FROM blogs a INNER JOIN comments b ON a.blog_id = b.blog_id WHERE a.blog_id = $blog_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getView($blog_id)
    {
        $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            $view = $query->fetch(PDO::FETCH_ASSOC);
            return $view["views"];
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateView($blog_id, $view)
    {
        $sql = "UPDATE blogs SET views = $view WHERE blog_id = $blog_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $view;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCommentsByBlog($blog_id)
    {
        $sql = "SELECT a.*, b.* FROM comments a INNER JOIN users b ON a.user_id = b.user_id WHERE blog_id = $blog_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function submitComment($comment, $user_id, $blog_id, $reply_to)
    {
        $sql = "INSERT INTO comments (comment, user_id, blog_id, reply_to) VALUES (:comment, :user_id, :blog_id, :reply_to)";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":comment" => $comment,
                ":user_id" => $user_id,
                ":blog_id" => $blog_id,
                ":reply_to" => $reply_to
            );
            $query->execute($parameters);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCommentById($comment_id)
    {
        $sql = "SELECT * FROM comments a INNER JOIN users b ON a.user_id = b.user_id WHERE a.comment_id = $comment_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            $arr = $query->fetch(PDO::FETCH_ASSOC);
            return json_encode($arr);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCategoryByBlog($blog_id)
    {
        $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            $category = $query->fetch(PDO::FETCH_ASSOC);
            return $category["category_id"];
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getRelatedPosts($category_id)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $category_id ORDER BY created_at DESC LIMIT 5";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getBlog($id_cate, $limit = 6, $page = 1)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $id_cate ORDER BY created_at DESC" . " LIMIT " . (($page - 1) * $limit) . "," . $limit;
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getTotal()
    {
        $sql = "SELECT * FROM blogs";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // load users
    public function getUsers()
    {
        $sql = "SELECT a.*, b.rule FROM users a INNER JOIN rule_users b ON a.id_group = b.id_group ORDER BY created_at DESC";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    // end load users

    public function getUserById($user_id)
    {
        $sql = "SELECT a.*, b.rule FROM users a INNER JOIN rule_users b ON a.id_group = b.id_group WHERE user_id = $user_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // insert users
    public function insertUser ($username, $password, $email, $avatar,  $id_group)
    {
        $sql = "INSERT INTO users (username, password, email, avatar , id_group) VALUES (:username, :password, :email, :avatar, :id_group)";
        try{
            $query = $this->db->prepare($sql);
            $parameter = array(
                ":username" => $username,
                ":password" => $password,
                ":email" => $email,
                ":avatar" => $avatar,
                ":id_group" => $id_group
            );
            return $query->execute($parameter);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    // end insert users

    public function editUser($user_id, $id_group)
    {
        $sql = "UPDATE users SET id_group = $id_group WHERE user_id = $user_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            echo $id_group;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // delete uswsers
    public function delete($id_user)
    {
        $sql = "DELETE FROM users WHERE user_id = :id_user";
        try {
            $query = $this->db->prepare($sql);
            $parameter = array(
              ":id_user" => $id_user
            );
            return $query->execute($parameter);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    // delete posts
    public function delete_post ($blog_id)
    {
        $sql = "DELETE FROM blogs WHERE blog_id = $blog_id";
        try {
            $query = $this->db->prepare($sql);
            return $query->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    // thai gửi
    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCategoryById($category_id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = $category_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function createCategory($name_category, $description)
    {
        $sql = "INSERT INTO categories (name_category, description) VALUES (:name_category, :description)";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":name_category" => $name_category,
                ":description" => $description
            );
            return $query->execute($parameters);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editCategory($category_id, $type, $name_category = null, $description = null)
    {
//        $sql = "UPDATE categories SET name_category = :name_category, description = :description WHERE category_id = $category_id";
        switch ($type) {
            case "name_category":
                $sql = "UPDATE categories SET name_category = :name_category WHERE category_id = $category_id";
                try{
                    $query = $this->db->prepare($sql);
                    $parameters = array(
                        ":name_category" => $name_category
                    );
                    $query->execute($parameters);
                    return $name_category;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "category_description":
                $sql = "UPDATE categories SET description = :description WHERE category_id = $category_id";
                try{
                    $query = $this->db->prepare($sql);
                    $parameters = array(
                        ":description" => $description
                    );
                    $query->execute($parameters);
                    return $description;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                break;
            default:
                break;
        }
    }

    public function getBlogAdmin($from,$so_tin_1trang)
    {
        $sql = "SELECT a.*, b.name_category, c.username FROM blogs a INNER JOIN categories b ON a.category_id = b.category_id INNER JOIN users c ON a.user_id = c.user_id ORDER BY a.created_at DESC LIMIT  $from, $so_tin_1trang ";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function createBlog($title, $description, $content, $category_id, $user_id, $image)
    {
        $sql = "INSERT INTO blogs (title, description, content, category_id, user_id , image) VALUES (:title, :description, :content, :category_id, :user_id, :image)";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":title" => $title,
                ":description" => $description,
                ":content" => $content,
                ":category_id" => $category_id,
                ":user_id" => $user_id,
                ":image" => $image

            );
            return $query->execute($parameters);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function phanTrang ($tablename, $from, $so_tin_1trang)
    {
        $sql = "SELECT * FROM $tablename ORDER BY created_at DESC LIMIT  $from, $so_tin_1trang ";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }


    // get blog
    public function getOneBlog ($blog_id)
    {
        $sql = "SELECT * FROM blogs WHERE blog_id = :blog_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":blog_id"=>$blog_id
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            $e->getMessage();
        }
    }

    // update chi tiết blog
    public function edit_blog_img ($title, $description, $content, $category_id ,$image, $blog_id )
    {
        $sql = "UPDATE blogs SET title = :title, description = :description, content = :content, category_id = :category_id , image = :image WHERE blog_id = :blog_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":title" => $title,
                ":description" => $description,
                ":content"=> $content,
                ":category_id" => $category_id,
                ":image"=> $image,
                "blog_id" => $blog_id
            );
            return $query->execute($parameters);
        }catch (PDOException $e){
            $e->getMessage();
        }
    }
    public function edit_blog ($title, $description, $content, $category_id, $blog_id )
    {
        $sql = "UPDATE blogs SET title = :title, description = :description, content = :content, category_id = :category_id  WHERE blog_id = :blog_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":title" => $title,
                ":description" => $description,
                ":content"=> $content,
                ":category_id" => $category_id,
                "blog_id" => $blog_id
            );
            return $query->execute($parameters);
        }catch (PDOException $e){
            $e->getMessage();
        }
    }

    public function get_category_blog ($category_id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = :category_id";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
              ":category_id" => $category_id
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            $e->getMessage();
        }
    }

    public function getComments()
    {
        $sql = "SELECT a.*, b.username, c.title FROM comments a INNER JOIN users b ON a.user_id = b.user_id INNER JOIN blogs c ON a.blog_id = c.blog_id ORDER BY created_at DESC";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getBlogCate ($category_id)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $category_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCategory_blog ($category_id, $from, $so_tin_1trang)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $category_id ORDER BY blogs.created_at DESC LIMIT  $from, $so_tin_1trang  ";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function search ($search)
    {
        $sql = "SELECT title FROM blogs WHERE title LIKE '%$search%' LIMIT 0,5";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    // get profile user

    public function profile ($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":user_id" => $user_id
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateProfile($user_id, $type, $email = null, $description = null)
    {
        if ($type == "email_edit") {
            $sql = "UPDATE users SET email = :email WHERE user_id = $user_id";
            try{
                $query = $this->db->prepare($sql);
                $parameters = array(
                    ":email" => $email
                );
                $query->execute($parameters);
                return $email;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        } elseif ($type == "description_edit") {
            $sql = "UPDATE users SET description = :description WHERE user_id = $user_id";
            try{
                $query = $this->db->prepare($sql);
                $parameters = array(
                    ":description" => $description
                );
                $query->execute($parameters);
                return $description;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

    public function updateAva ($id_user, $fileImage)
    {
        $sql = "UPDATE users SET avarar = $fileImage WHERE user_id = $id_user";
        try{
            $query = $this->db->prepare($sql);
            $parameter = array(
                ":fileImage" => $fileImage,
                ":id_user" => $id_user
            );
            return $query->execute($parameter);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function checkEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        try{
            $query = $this->db->prepare($sql);
            $parameter = array(
                ":email" => $email
            );
            $query->execute($parameter);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updatePassword($user_id, $password)
    {
        $sql = "UPDATE users SET password = :password WHERE user_id = :user_id";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":password" => $password,
                ":user_id" => $user_id,
            );
            return $query->execute($parameters);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
