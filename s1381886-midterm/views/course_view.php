<html>
<head><title>Courses</title></head>
<body>

<h1 align="center">Courses</h1>
<p align="center"><a href="newcourse.php">Add Course</a></p>
    <table border="1" align="center">
    <tr><th>ID</th><th>Course Number</th><th>Decription</th></tr>

<?php

  foreach ($course_list as $course) {
    echo '<tr><td>' . $course['id']. '</td><td>' . $course['course_number']. '</td><td>' . $course['course_description']. '</td></tr>';
  }


?>
</table>

    <p align="center"><a href="studentlist.php">Students</a></p>
    <p align="center"><a href="login.php">Main</a></p>
</body>
</hmtl>
