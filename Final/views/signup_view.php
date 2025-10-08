<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Bookclub</title>
  <script type="text/javascript" src="../scripts/signup.js"></script>
  <link rel='stylesheet' href='../styles/signup.css'>
</head>
<body>
  <form class="signup-form" method="post" action=signup.php?action=add onSubmit="return validateSignup(this)">
    <h2>Sign Up</h2>
    <label for="members_id">Member ID: </label>
    <input type="text" id="member_id" name="members_id" required><br>
    
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" required><br>

    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phonenumber" required><br>

    <label for="email">Email: </label>
    <input type="text" id="email" name="email" required><br>
    
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Sign Up">
    <p align="center"><a href="login.php">Login</a></p> 
  </form>
  
</body>
</html>