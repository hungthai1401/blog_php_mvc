<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/19/2016
 * Time: 2:38 PM
 */
class Verify extends Controller
{
    public function index()
    {
        if (isset($_GET["token"]) && $_GET["token"] == md5($_GET["email"])) {
            $_SESSION["reset"] = md5($_GET["email"]);
            header("Location: ". URL."reset/change");
        } else {
            header("Location: ". URL);
        }
    }
}