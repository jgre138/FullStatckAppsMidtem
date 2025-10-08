<?php
require_once '../models/course_model.php';

$model = new CourseModel();

 $course_list = $model->listCourses();

 //var_dump($course_list);


require_once '../views/course_view.php';
?>

