<?php
require_once '../models/members_model.php';
require_once '../models/credentials_model.php';

$m_model = new MembersModel();
$c_model = new CredentialsModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        // print_r($_POST);
        $members_id = $_POST['members_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $added_member = $m_model->add_member($members_id, $first_name, $last_name, $address, $phonenumber);
        $added_login = $c_model->add_login($email, $password, $members_id);
        // print_r($added_member);
        // echo "added member - Welcome!";
    }
} 

include '../views/signup_view.php'
?>