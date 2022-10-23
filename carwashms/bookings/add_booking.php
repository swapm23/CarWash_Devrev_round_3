<?php
include '../logincheck.php';
include '../connect.php';
$showAlert = false;
$showerror = false;
$user = $_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST"){   
  $booking_name = $_POST["booking_name"];
  $location = $_POST['location'];
  $date = $_POST['date'];
  $serv = $_POST['service'];

  $sql = "Select * from bookings where date='$date'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num >= 5){
      $showerror = true;
    }
    else{
        $sql = "INSERT INTO `bookings` (`bookingid`, `name`, `date`, `location`, `status`, `user`, `service`) VALUES (NULL, '$booking_name', '$date', '$location', '0', '$user','$serv')";
        $result = mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
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
    <link href="home.css" rel="stylesheet">
    
    <title>Create Booking</title>
  </head>
  <body>
  <?php
  if($loggedin==false){
    echo ("<script LANGUAGE='JavaScript'> window.alert('Session expired. Please re-login.');
    window.location.href='../index.php';
    </script>");
  } 
  ?>
      <?php require '../nav.php' ?>
<?php
if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Booking added succesfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if($showerror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> All 5 Slots are full. You can create booking for another date.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<div id="cont">
<div class="container ">
    <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline;" >Add Bookings</h1>
</div>
<form action="/carwashms/bookings/add_booking.php" method="post" style="margin: 50px">
  <div class="mb-3 col-md-6">
    <label for="booking_name" class="form-label">Booking in name of :</label>
    <input type="text" class="form-control" id="booking_name" name="booking_name" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="date" class="form-label">Date of Booking:</label>
    <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
  <label for="location" class="form-label">Select Location:</label>
    <select class="form-control" style="width:50%;" id = "inputstate" name="location">
    <?php 
    $sql = "select * from locations";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <option value = "<?php echo $row['city']; ?>" selected><?php echo $row['city'];?></option>
    <?php 
    }
    ?>
    </select>
  </div>
  <div class="mb-3 col-md-6">
  <label for="location" class="form-label">Select Service:</label>
    <select class="form-control" style="width:50%;" id = "inputstate" name="service">
    <?php 
    $sql = "select * from services";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <option value = "<?php echo $row['offered']; ?>" selected><?php echo $row['offered'];?></option>
    <?php 
    }
    ?>
    </select><br>
  </div>
  
  <input type="submit" name="submit" value="Submit">
</div></form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>