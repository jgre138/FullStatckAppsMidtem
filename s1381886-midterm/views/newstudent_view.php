<html><head><title>Add a New Students</title></head>
<form align="center" method="post" action=newstudent.php?action=add>
<fieldset>
    <legend>New Student:</legend>
    <label for="studentID">Student ID: </label>
    <input type="text" id="student_id" name="student_id" value="" placeholder="Enter Student ID"><br>

    <label for="first_name">First Name: </label>
    <input type="text" id="first_name" name="first_name" value="" placeholder="Enter first name"><br>

    <label for="last_name">Last Name: </label>
    <input type="text" name="last_name" value="" placeholder="Enter last name"><br>

    <label for="classOf">Class Of: </label>
    <input type="text" name="classOf" value="" placeholder="Enter Aticipated Graduation Year"><br>

    <label for="email">Email: </label>
    <input type="text" name="email" value="" placeholder="Enter Email"><br>
    
    <label for="password">Password: </label>
    <input type="password" name="password" value="" placeholder="Enter Password"><br>

    <hr>
    <input type="submit" value="Add">
</fieldset>
</form>
<body>
    <p align="center"><a href="studentlist.php">Students</a></p>
    <p align="center"><a href="courses.php">Courses</a></p>
    <p align="center"><a href="login.php">Main</a></p>  
</body>

</html>
