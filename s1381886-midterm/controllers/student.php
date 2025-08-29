<?php
require_once '../models/registar_model.php';
require_once '../models/students_model.php';

$get_vars = $_GET;
$id = $get_vars["id"];

$s_model = new StudentsModel();
$r_model = new RegistrationModel();

$students = $s_model->find_student_by_id($id);
// var_dump($students);

$students_registration = $r_model->listStudentsCourses($id); //test this

//  var_dump($students_registrations);

include_once '../views/registeredcourses_view.php';

?>

