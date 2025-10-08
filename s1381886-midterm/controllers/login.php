<?php

require_once '../models/credentials_model.php';

$message = "Please enter your login credentials";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $model = new CredentialsModel();
        $validLogin = $model->verify_login($_POST["email"], $_POST["password"]);
        if ($validLogin == 1) {
            header ('Location: studentlist.php');
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
}

include '../views/login_view.php'

?>
