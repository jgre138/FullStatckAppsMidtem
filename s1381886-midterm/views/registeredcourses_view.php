<html>
<head>
    <title>Registered Courses</title>
</head>
<body>
    <p align="center"> Registered Courses</p>
    
<?php 

    $get_vars = $_GET;
    $id = $get_vars["id"];

    foreach($students as $student){
    echo '<p align="center">Student: ' . $student['first_name'] .' ' . $student['last_name'] . '</p>';
    }


    echo '<p align="center"><a href="register.php?id='. $id . '">Register AnotherCourse</a></p>';

?>
    <table border="1" align="center">
    <tr><th>Course ID</th><th>Number</th><th>Decription</th></tr>

<?php

  foreach ($students_registration as $registrations) {
    echo '<tr><td>' . $registrations['courses_id']. '</td><td>' . $registrations['course_number']. '</td><td>' . $registrations['course_description']. '</td></tr>';
  }


?>
</table>
    <p align="center"><a href="studentlist.php">Students</a></p>
    <p align="center"><a href="courses.php">Courses</a></p>
    <p align="center"><a href="login.php">Main</a></p>

</body>



</html>
