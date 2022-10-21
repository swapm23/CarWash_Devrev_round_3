<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'connect.php';

    $showAlert = false;
    $showError = false;
    $username = $_POST["username"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` (`username`, `fname`, `lname`, `password`, `dt`) VALUES ('$username', '$fname', '$lname', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}

?>