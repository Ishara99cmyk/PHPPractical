<DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <script src="../js/validation.js"></script>
        <link rel="stylesheet" href="../css/register_form.css">
    </head>
        <body>
            <h1>Register</h1>
            <form name="regForm" onsubmit="return validateForm()" action= "register_action.php" method="post">
                Email: <input type="email" name="email" required><br>
                Username: <input type="text" name="username" required><br>
                Password: <input type="password" name="password" required><br>
                <input type="submit" value="Register">
            </form>
        </body>
</html>    