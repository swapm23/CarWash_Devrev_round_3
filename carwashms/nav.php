<link href="nav.css" rel="stylesheet">
<?php

if($loggedin && $_SESSION['role'] == 1){
  require '../connect.php';
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
          <div class="container-fluid">
          <a class="navbar-brand" href="/carwashms/admin/admin.php">CAR WASH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id= "al" class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item" style="margin-inline: 10px;">
                <a class="nav-link" aria-current="page" href="/carwashms/admin/admin.php">Home</a>
              </li >
              <li class="nav-item" style="margin-inline: 10px;">  
                <a class="nav-link" href="/carwashms/bookings/add_booking.php">Create Bookings</a>
              </li>
              <li class="nav-item"style="margin-inline: 10px;">
                <a class="nav-link" href="/carwashms/bookings/booking_list.php">View Bookings</a>
              </li>
              <li class="nav-item" style="margin-inline: 10px;">
                  <a class="nav-link" aria-current="page" href="/carwashms/bookings/requests.php">Manage User Requests</a>
              </li>
              <li class="nav-item" style="margin-inline: 10px;">
                <a class="nav-link" href="/carwashms/logout.php">Logout</a>
              </li>
              
              <li class="nav-item" style="margin-inline: 10px;">
                <button type="button" class="btn btn-primary">
                Pending booking requests <span class="badge bg-secondary">';
    if($loggedin){
                  $sql = "select * from bookings where status = 0";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_num_rows($result);
                  echo $row;
                  echo '</span>
                  </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>';
    }       
  }
  elseif($loggedin){
    require '../connect.php';
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
    <div class="container-fluid navdiv">
      <a class="navbar-brand" href="/carwashms/users/home.php">CAR WASH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="al" class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow:0;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style="margin-inline: 10px;">
            <a class="nav-link" aria-current="page" href="/carwashms/users/home.php">Home</a>
          </li>
          <li class="nav-item" style="margin-inline: 10px;">
            <a class="nav-link" href="/carwashms/bookings/add_booking.php">Create Bookings</a>
          </li>
          <li class="nav-item" style="margin-inline: 10px;">
            <a class="nav-link" href="/carwashms/bookings/booking_list.php">View Bookings</a>
          </li>
          <li class="nav-item" style="margin-inline: 10px;">
            <a class="nav-link" href="/carwashms/logout.php">Logout</a>
          </li>
      <div>
    </div>
  </nav>';
}
else{
  require 'connect.php';
echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">CAR WASH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
          </li>
      </div>
    </div>
  </nav>';
}
?>