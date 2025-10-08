<?php
require_once '../models/books_model.php';

session_start();

if (!isset($_SESSION['user_info'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_id = $_SESSION['user_info']['id'];

$bk_model = new BookModel();

// var_dump($logged_in_id);


function saveUploadedFile() {
    $target_dir = "../uploads/";
    $upload = true;
    $target_name =  time(). "-" . basename($_FILES["bookcover"]["name"]);
    $target_path = $target_dir . $target_name;

   
    if ($upload) {
        if (move_uploaded_file($_FILES["bookcover"]["tmp_name"], $target_path)) {
            return $target_name;
        } else {
            return "";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        // print_r($_POST);
        // print_r($_FILES);
        // call the model method to insert the student
        $title = $_POST['title'];
        $author = $_POST['author'];
        $bookcover = "";  
        $status = "Availible";      
        $members_id = $logged_in_id;
        $saved_message = "";
        if ($_FILES['bookcover']['tmp_name'] != "") {
            $bookcover = saveUploadedFile();
        }

        // var_dump([
        //     'title' => $title,
        //     'author' => $author,
        //     'bookcover' => $bookcover,
        //     'status' => $status,
        //     'members_id' => $members_id,
        // ]);

        $added_book = $bk_model->add_book($title, $author, $bookcover, $status, $members_id);
        // print_r($added_book);
        $saved_message = "added book with bookcover file: " . $bookcover;
        echo $saved_message;
    }
} 




include '../views/newbook_view.php'
?>

