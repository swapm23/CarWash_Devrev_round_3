<?php
session_start();
include 'connect.php';

$query = "SELECT * FROM `profile` WHERE user='$_SESSION[username]'";
$res = mysqli_query($conn, $query);
$n = mysqli_num_rows($res);
if($n == 1){
    header("location: home.php");
}
else{
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
      $user = $_POST["user"];  
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
    
      if($user == $_SESSION['username'])
      {
        $sql = "INSERT INTO `profile` (`user`, `fname`, `lname`, `email`, `phone`) VALUES ('$user', '$fname', '$lname', '$email', '$phone')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: home.php");
        }
      }
      else{
        $showError = "Username does not match";
      }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="nav.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">

    <title>Profile</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-lighst">
  <div class="container-fluid" style="background-color: #0082e6; font-family: montserrat">
    <span class="navbar-brand" href="home.php" style="color: white;
    font-size: 35px;
    line-height: 80px;
    padding: 0 50px;
    font-weight: bold;">CAR WASH</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: white">Logout</a>
        </li>
      </ul>
</nav>
<?php
if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<div class="container">
    <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline;" >Create Profile</h1>
</div>

<form action="/carwash/create_profile.php" method="post" style="margin: 50px">
  <div class="mb-3 col-md-6">
    <label for="user" class="form-label">Username:</label>
    <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="fname" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="lname" class="form-label">Last Name:</label>
    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="email" class="form-label">E-mail:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
  </div>
    <label for="phone" class="form-label">Phone Number:</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
  <input type="submit" name="submit" value="Submit">
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>