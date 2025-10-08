<html><head><title>Login</title></head>
<form method="post" action=login.php?action=login>
<fieldset align="center">
    <legend>Login:</legend>
    <label for="email">Email: </label>
    <input type="text" id="email" name="email" value="" size="64"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>
    <p><i><?= $message; ?>
    <hr>
    <input type="submit" value="Login">
</fieldset>
</form>
<body>
    <p align="center"><a href="enrollstudent.php">Enroll Student</a></p>
</body>

</html>

