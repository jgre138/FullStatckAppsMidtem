<html>
<head>
    <title>Register For A Course</title>
</head>
<body>
    <p align="center">Register For A Course</p>
<?php
    $get_vars = $_GET;
    $id = $get_vars["id"];

    echo '<form align="center" method="post" action=register.php?id=' . $id . '&action=add>';

    foreach($students as $student){
        echo '<p>Student: ' . $student['first_name'] .' ' . $student['last_name'] . '</p>';
    }
?>


    <fieldset>
        <legend>Register Course: </legend>
        <label for="courses_id">Select Course</label>
        <select name="courses_id" id="courses_id">
<?php
    
        foreach ($course_list as $courses){
            echo '<option value="' . $courses['id'] . '">' . $courses['course_description'] . '</option>';
     }


?>
        </select>
        <input type="submit" value="Add">
    </fieldset>
</form>

    <p align="center"><a href="studentlist.php">Students</a></p>
    <p align="center"><a href="courses.php">Courses</a></p>
    <p align="center"><a href="login.php">Main</a></p>

</body>
</html>
