<link href="nav.css" rel="stylesheet">
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin = true;
}
else{
    $loggedin = false;
}
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-lighst">
  <div class="container-fluid" style="background-color: #0082e6; font-family: montserrat">
    <a class="navbar-brand" href="home.php" style="color: white;
    font-size: 35px;
    line-height: 70px;
    padding: 0 50px;
    font-weight: bold;">CAR WASH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
      if($loggedin){
          echo'<li class="nav-item">
          <a class="nav-link" href="add_booking.php" style="color: white">Book car wash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking_list.php" style="color: white">My bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: white">Logout</a>
        </li>';
      }
        
if(!$loggedin){
    echo   '<li class="nav-item">
          <a class="nav-link" href="index.php" style="color: white">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php" style="color: white">Signup</a>
        </li>';
}

       

echo      '</ul>

    </div>
  </div>
</nav>';
?>
