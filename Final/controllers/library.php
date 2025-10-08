<?php
require_once '../models/books_model.php';

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$model = new BookModel();

$books_list = $model->listBooks();

//var_dump($books_list);


require_once '../views/library_view.php';
?>