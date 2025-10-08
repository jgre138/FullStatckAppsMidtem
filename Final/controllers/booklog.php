<?php
require_once '../models/borrows_model.php';
require_once '../models/books_model.php';

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$get_vars = $_GET;
$book_id = $get_vars["id"];

//var_dump($book_id);

$b_model = new BorrowModel();
$bk_model = new BookModel();

$book_data = $bk_model->find_book_by_id($book_id);

// var_dump($book_data);

$book_log = $b_model->listBorrowsLog($book_id);

include '../views/booklog_view.php'
?>