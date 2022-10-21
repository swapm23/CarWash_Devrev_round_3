<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include 'connect.php';

  $username = $_POST["username"];
  $password = $_POST["password"];
  $len = strlen($password);
  $uppercase = 0;
  $number = 0;
  while($len != 0){
    $count = $count+1;
    $len = $len -1;
    for($i = 0 ; $i < strlen($password); $i =$i + 1){
      if(ctype_upper($password[$i]) || $password[$i] == range(0,9)){
        $uppercase = 1;
        $number =1;
        break;
      }
    }
  }
  if($count < 8 || $uppercase == 0 || $number ==0){
    $showError = "Password is short or does not contain any upper case letter or no numbers are there in the password.";
  }
  else{
    $cpassword = $_POST["cpassword"];

  $existSql = "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);

  if($numExistRows > 0){
    $showError = "Username already exists";
  }
  else{
    if($password == $cpassword){
      $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if($result){
        $showAlert = true;
      }
    }
    else{
      $showError = "Passwords do not match";
    }
  }

}
  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="home.css" rel="stylesheet">

    <title>Signup</title>
</head>
<body>
  <?php require 'nav.php' ?>

<?php
  if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Account created succesfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

  if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>


<div class="container">
    <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline;" >Signup</h1>
</div>

<form action="/carwash/signup.php" method="post" style="margin: 50px">
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm password:</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
  </div>
  <!-- <div class="mb-3 form-check ">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <input type="submit" name="submit" value="Signup">
  <!-- <button type="submit" class="btn btn-primary">Signup</button> -->
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>
