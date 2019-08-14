<?php
    include("../includes/config.php");

    if (isset($_POST['btnCreateUser'])) {
        $email  = $_POST['email'];
        $pass   = $_POST['pass'];
        $name   = $_POST['name'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows == 0) {
                //Email Address Doesnt Exists
                //Add User to Database
                $pass   = md5($pass); //We are Encrypting Password with MD5 Hash
                $addSQL = "INSERT INTO users (email, password, name) VALUES ('$email', '$pass', '$name')";
                $conn->query($addSQL);

                echo "New User Added";
            } else {
                //Email Address Already Exists
                echo "Email Address Already Exists";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin: Users</title>
    </head>

    <body>
        <div>
            <form action="" method="POST">
                <label>Email Address</label>
                <input name="email" type="text" placeholder="Enter Email Address..." />

                <label>Password</label>
                <input name="pass" type="password" placeholder="Password..." />

                <label>Full Name</label>
                <input name="name" type="text" placeholder="Full Name..." />

                <button name="btnCreateUser">Create User</button>
            </form>
        </div>

        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $userResult = $conn->query('SELECT * FROM users');
                        if ($userResult->num_rows != 0) {
                            while ($row = $userResult->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["name"];?></td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>