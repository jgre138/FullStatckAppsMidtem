<?php
require_once '../models/credentials_model.php';

$message = "Please enter your login credentials";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $model = new CredentialsModel();
        $user_found = $model->verify_login($_POST["email"], $_POST["password"]);
        if ($user_found) {
            session_start();
            $user_info = [ "id" => $user_found["members_id"]]; 
            $_SESSION["user_info"] = $user_info;
            
            header ('Location: library.php');
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
}

include '../views/login_view.php'
?>