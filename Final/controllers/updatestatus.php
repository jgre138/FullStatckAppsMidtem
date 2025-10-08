<?php
require_once '../models/books_model.php';
require_once '../models/members_model.php';

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_id = $_SESSION['user_info']['id'];


$bk_model= new BookModel();
$m_model = new MembersModel();

$members = $m_model -> find_member_by_id($logged_in_id);

$books_list= $bk_model->listMyBorrowedBooks($logged_in_id);

// var_dump($books_list);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    

    if (isset($getvars["action"]) && $getvars["action"] == 'update') {
        $books_id = $_POST['books_id'];
        $status = "Availible";

        $update_status=$bk_model->updateStatus($status, $books_id);
        // print_r($added_borrow);
        echo "Updated book!";
    }
} 

include '../views/updatestatus_view.php'
?>