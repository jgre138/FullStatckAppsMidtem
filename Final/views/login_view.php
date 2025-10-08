<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Login - Bookclub</title>
        <script type="text/javascript" src="../scripts/login.js"></script>
        <link rel='stylesheet' href='../styles/login.css'>
    </head>
    <body>
        <div class="container">
            <div class="center">
                <h1>Bookclub Login</h1>
                    <form method="post" action=login.php?action=login onSubmit="return validateLogin(this)">
                    <div class="txt_field">
                    <input type="text" name="email" required>
                    <span></span>
                    <label for="enail">Email: </label>
                    </div>
                    <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label for="password">Password</label>
                    </div>
                
                    <input name="submit" type="Submit" value="Login">
                    <div class="signup_link">
                        Not a Member? <a href="signup.php">Join the club!</a>
                </div>
            </form>
            </div>
        </div>
    </body>

</html>