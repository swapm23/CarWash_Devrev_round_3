<?php 

$login = false;
$showerror = false;
$loggedin = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require 'connect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);   
    $num = mysqli_num_rows($result);
    if($num == 1){
        session_start();
        $login = true;
        $_SESSION['loggedin'] = $login;
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        header("location: create_profile.php");
    }
    else{
      $showerror = "Invalid Credentials. Try again...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Carwash login</title>
</head>
<body>

<?php require 'nav.php'; ?>
<br>

<?php 
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!&nbsp;</strong>'.$showerror.'
    <button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
?>

<section class="vh-98">

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img id = "imgindex" src="indeximg.jpg" >
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <!-- Form -->
        <form action="/carwashms/index.php" method="post">
          <div><h3>CAR WASH</h3></div>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Login</p>
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" name = "username" id="username" class="form-control form-control-lg"
              placeholder="Enter username" />
            <label class="form-label" for="username">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name = "password" id="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">

           <!-- Submit --> 
          <input type="submit" name="submit" value="Login"><br><br>

            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                class="link-primary">Register</a></p>
          </div>
        </form>

      </div>
    </div>
  </div><br>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-2 px-2 px-xl-3 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. All rights reserved by Swapnil Mishra.
    </div>
  </div>
</section>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
</body>
</html>