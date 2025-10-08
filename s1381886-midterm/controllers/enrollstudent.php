<?php

require_once '../models/students_model.php';
require_once '../models/credentials_model.php';

$students_model = new StudentsModel();
$credentials_model = new CredentialsModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        // print_r($_POST);
        // call the model method to insert the student into student table, and thier login into the credentials table
        $student_id = $_POST['student_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $classOf = $_POST['classOf'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $added_student = $students_model->add_student($student_id, $first_name, $last_name, $classOf);
        $added_login = $credentials_model->add_login($email, $password, $student_id);
        // print_r($added_student);
        echo "added student";
    }
} 

include '../views/enrollstudent_view.php'

?>
