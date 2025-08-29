<html>
<head>
    <title>New Course</title>
</head>
<body>
<form align="center" method="post" action=newcourse.php?action=add>
<fieldset>
    <legend>New Course:</legend>
    <label for="course_number">Course Number: </label>
    <input type="text" id="course_number" name="course_number" value="" placeholder="Enter Course Number"><br>

    <label for="course_description">Course Description: </label>
    <input type="text" id="course_description" name="course_description" value="" placeholder="Enter Course Description"><br>

    <hr>
    <input type="submit" value="Add">
</fieldset>
</form>

    <p align="center"><a href="studentlist.php">Students</a></p>
    <p align=center><a href="courses.php">Courses</a></p>
    <p align="center"><a href="login.php">Main</a></p>


</body>
</html>
