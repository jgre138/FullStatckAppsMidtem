<?php

require_once '../models/course_model.php';

$course_model = new CourseModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        print_r($_POST);

        $course_number = $_POST['course_number'];
        $course_description = $_POST['course_description'];
       
        $added_course = $course_model->addCourse($course_number, $course_description);
        // print_r($added_course);
        echo "added course";
    }
} 

include '../views/newcourse_view.php'
?>