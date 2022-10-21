<?php
include 'connect.php';
session_start();
$showAlert = false;
$showerror = false;

$sql = "Select * from events";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num >=5){
      $showerror = true;
    }
    else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){   
        $booking_name = $_POST["booking_name"];
        $date = $_POST["date"];
        $location = $_POST["location"];

        $sql = "INSERT INTO `events` (`booking_name`, `date`, `location`) VALUES ('".addslashes($booking_name)."', '$date', '$location')";
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
      <?php require 'nav.php' ?>
<?php
if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Booking added succesfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if($showerror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Max bookings limit is 5 bookings.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<div class="container">
    <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline;" >Add Bookings</h1>
</div>
<form action="/carwash/add_booking.php" method="post" style="margin: 50px">
  <div class="mb-3 col-md-6">
    <label for="booking_name" class="form-label">Booking in name of :</label>
    <input type="text" class="form-control" id="booking_name" name="booking_name" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="date" class="form-label">Date of Booking:</label>
    <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>
  </div>
    <label for="location" class="form-label">Location:</label>
    <input type="text" class="form-control" id="location" name="location" required>
  </div>
  <input type="submit" name="submit" value="Submit">
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>