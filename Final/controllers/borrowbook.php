<?php
require_once '../models/borrows_model.php';
require_once '../models/members_model.php';
require_once '../models/books_model.php';

date_default_timezone_set('America/New_York');

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_id = $_SESSION['user_info']['id'];

$b_model = new BorrowModel();
$m_model = new MembersModel();
$bk_model= new BookModel();

$members = $m_model -> find_member_by_id($logged_in_id);

//var_dump($members);
$availible_list= $bk_model->listAvailibleBooks($logged_in_id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    

    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        $members_id = $logged_in_id;
        $books_id = $_POST['books_id'];
        $borrow_date = date('Y-m-d H:i:s'); // Format: "YYYY-MM-DD HH:MM:SS"
        $status = "Borrowed";

        $added_borrow= $b_model->add_borrow($members_id, $books_id, $borrow_date);
        $update_status=$bk_model->updateStatus($status, $books_id);
        // print_r($added_borrow);
        echo "Borrowed book!";
    }
} 

include '../views/borrowbook_view.php'
?>