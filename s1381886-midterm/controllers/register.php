<?php
require_once '../models/registar_model.php';
require_once '../models/students_model.php';

$get_vars = $_GET;
$student_id = $get_vars["id"];

$r_model = new RegistrationModel();
$s_model = new StudentsModel();

$students = $s_model->find_student_by_id($student_id);

$course_list = $r_model->listOtherCourses($student_id);
//var_dump($course_list);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    

    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        $students_id = $student_id;
        $course_id = $_POST['courses_id'];

        $added_register = $r_model->add_registration($students_id, $course_id);
        // print_r($added_student);
        echo "added registration";
    }
} 




require_once '../views/registercourse_view.php';
?>
