<?php
require_once '../models/books_model.php';

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_id = $_SESSION['user_info']['id'];

$bk_model = new BookModel();

$mybooks_list = $bk_model->listMyBooks($logged_in_id);

$borrowed_books = $bk_model->listMembersBooks($logged_in_id);

// var_dump($borrowed_books);


include '../views/mybooks_view.php'
?>