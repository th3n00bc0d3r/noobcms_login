<?php
    include("includes/config.php");

    if (isset($_POST['btnLogin'])) {
        $email  = $_POST['email'];
        $pass   = md5($_POST['pass']);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows == 1) {
                echo "Login Successful";
            } else {
                echo "Invalid Credentials";
            }
        }
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>

    <body>
        <div>
            <form action="" method="POST">
                <label>Email Address</label>
                <input name="email" type="text" placeholder="Enter Email Address..." />

                <label>Password</label>
                <input name="pass" type="password" placeholder="Password..." />

                <button name="btnLogin">Login</button>
            </form>            
        </div>
    </body>

</html>