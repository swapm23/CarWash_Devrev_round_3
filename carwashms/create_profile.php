<?php
    session_start();
    include 'connect.php';
    $usr = $_SESSION['username'];
    $query = "select * from profile where user = '$usr'";
    $res = mysqli_query($conn, $query);
    $n = mysqli_num_rows($res);

    if($n == 1){
        if($_SESSION['role']==1){
            header("location: admin/admin.php");
        }
        else{
            header("location: users/home.php");
        }
    }
    else{
        $showError = false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = $_POST["user"];  
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $r = $_SESSION['role'];

            if($user == $_SESSION['username'])
            {
                $sql = "INSERT INTO `profile` (`fname`, `lname`, `email`, `phone`, `user`, `role`) VALUES ('$fname', '$lname', '$email', '$phone', '$user', '$r')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    if($_SESSION['role']==1){
                        header("location: admin/admin.php");
                    }
                    else{
                        header("location: users/home.php");
                    }  
                }
            }
            else{
                $showError = "Username does not match.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create profile</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">CAR WASH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          </div>
        </div>
    </nav>
    <?php 
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}   
    ?>
    <div>
    <div class="container">
        <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline;" >Create Profile</h1>
    </div>
    <form action="/carwashms/create_profile.php" method="post" style="margin: 50px">
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
    </div>

<?php 
if($_SESSION['loggedin'] == true){

}
else{
    echo ("<script LANGUAGE='JavaScript'> window.alert('Session expired. Please re-login.');
    window.location.href='index.php';
    </script>");
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>