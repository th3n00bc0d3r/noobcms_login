<?php
    //CREATE SESSTION
    session_start();

    //TIMEZONE
    date_default_timezone_set('Asia/Karachi');

    //SITE PATH
    define('SITE', 'http://localhost/noobcms/');
    
    //DATABASE CREDENTIALS
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'noob_db');

    //CREATE CONNECTION
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    
    //CHECK CONNECTION
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
?>