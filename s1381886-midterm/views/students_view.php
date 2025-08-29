<html>
<head><title>Students List</title></head>
<body>

<h1 align="center">Students List</h1>

<p align="center"><a href="newstudent.php">Add New Student</a>
    <table border="1" align="center">
    <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Class Of</th><th>Courses</th></tr>
<?php
 

  foreach ($students_list as $student) {
    $id = $student['id'];
    echo '<tr><td>' . $student['id'] . '</td><td>' . $student['first_name'] . '</td>';
    echo '<td>' . $student['last_name'] . '</td><td>' . $student['classOf'] . '</td><td><a href="student.php?id='. $id . '">List</a></td></tr>';
  }
?>
</table>
    <p align="center"><a href="courses.php">Courses</a></p>
    <p align="center"><a href="login.php">Main</a></p>
</body>
</hmtl>
