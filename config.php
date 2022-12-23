<?php
    $username ="root";
    $password ="";
    $SERVER='localhost';
    $database='university';
    $con = mysqli_connect($SERVER,$username,$password,$database);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>