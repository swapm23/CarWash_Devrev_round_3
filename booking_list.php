<?php
session_start();
include 'connect.php';

$sql = "SELECT * FROM `events`";
$result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="list.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">

    <title>Booking List</title>
  </head>
  <body>
    <?php require 'nav.php' ?>

<div>
    <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline; text-align: center;" >List of Bookings</h1>
</div>


<?php
while($row = mysqli_fetch_assoc($result)){
   echo' <div class="event">';
        echo $row["booking_name"].'<br>';
        echo 'Date: '. $row["date"]. '<br>';
        echo 'Location: '. $row["location"]. '<br>';
echo '</div>';
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>