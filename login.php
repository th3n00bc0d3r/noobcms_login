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

        <link href="css/bootstrap.min.css" rel="stylesheet" />

    </head>


    <style>
        .myLoginForm label {
            margin-top: 10px;
        }

        .myLoginForm button {
            margin-top: 10px;
        }
    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-4 offset-4">
                    <form action="" method="POST" class="myLoginForm">
                        <label>Email Address</label>
                        <input class="form-control" name="email" type="text" placeholder="Enter Email Address..." />

                        <label>Password</label>
                        <input class="form-control" name="pass" type="password" placeholder="Password..." />

                        <button class="btn btn-success" name="btnLogin">Login</button>
                    </form>            
                </div>
            </div>
        </div> 
    </body>

</html>