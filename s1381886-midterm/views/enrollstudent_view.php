<html><head><title>Enroll New Students</title></head>
<form align="center" method="post" action=enrollstudent.php?action=add>
<fieldset>
    <legend>Enroll a Student</legend>
    <label for="studentID">Student ID: </label>
    <input type="text" id="student_id" name="student_id" value="" placeholder="Enter Student ID"><br>

    <label for="first_name">First Name: </label>
    <input type="text" id="first_name" name="first_name" value="" placeholder="Enter first name"><br>

    <label for="last_name">Last Name: </label>
    <input type="text" name="last_name" value="" placeholder="Enter last name"><br>

    <label for="class_of">Class Of: </label>
    <input type="text" name="classOf" value="" placeholder="Enter Aticipated Graduation Year"><br>

    <label for="email">Email: </label>
    <input type="text" name="email" value="" placeholder="Enter Email"><br>

    <label for="password">Password: </label>
    <input type="password" name="password" value="" placeholder="Enter Password"><br>

    <hr>
    <input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Add">
</fieldset>
</form>
<body>
    <p align="center"><a href="login.php">Main</a></p>
</body>
</html>