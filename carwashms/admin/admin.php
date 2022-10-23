
<?php
    require '../logincheck.php';
    require '../connect.php';
    $msg = false;
    $loc = false;
    $adm = false;
    $serv = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (!empty($_POST['submit_btn'])) {
        if($_POST["pending_request"]==0){
            $msg = "No booking selected";
          }
          else{
            $id = $_POST["pending_request"];
            $status = $_POST["updated_status"];
            $sql = "UPDATE `bookings` SET `status` = '$status' WHERE `bookings`.`bookingid` = '$id'";
            $result = mysqli_query($conn, $sql);
            if($result){
              $msg = "Booking status updated for bookingID : $id";
            }
          }
        }
        elseif (!empty($_POST['loc_btn'])) {
          $city = $_POST['addloc'];
          $sql = "SELECT * FROM `locations` where city ='$city'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if($num > 0){
            $loc = "Location already exists.";
          }
          else{
            $sql = "INSERT INTO `locations` (`city`) VALUES ('$city')";
            $result = mysqli_query($conn, $sql);
            if($result){
              $loc = "Location added.";
            }
          }
       }
       elseif (!empty($_POST['ser_btn'])) {
          $ser = $_POST['addser'];
          $sql = "SELECT * FROM `services` where offered ='$ser'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if($num > 0){
            $serv = "Service already exists.";
          }
          else{
            $sql = "INSERT INTO `services` (`offered`) VALUES ('$ser')";
            $result = mysqli_query($conn, $sql);
            if($result){
              $serv = "Service added.";
            }
          }
       }
       elseif (!empty($_POST['admn_btn'])) {
          $a = $_POST['addadmin'];
          $sql = "SELECT * FROM `users` where username ='$a'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          if($row['role'] == 1){
            $adm = "Admin access already exists.";
          }
          else{
            $sql = "UPDATE `users` SET `role` = '1' WHERE `users`.`username` = '$a'";
            $result = mysqli_query($conn, $sql);
            if($result){
              $adm = "Admin access granted.";
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
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin home page</title>
    </head>
<body>
    <?php require '../nav.php'; ?>

  <div class="container">
    <div class="row">
        
    <div class="col-sm">
    <br>
    
    <div><br>
      <button type="button" style= "margin : 10px;" class="btn btn-info" id="btn">
      Add locations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
      <div>

        <form id="lform" method = "post" action="/carwashms/admin/admin.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Location to be added.</label>
          <input type="text" class="form-control" id="addloc" name="addloc">
        </div>
        <input type = "submit" name="loc_btn" value="Add">
      </form>
      </div>
    </div>
    <div><br>


      <button id = "btns" type="button" style= "margin : 10px;" class="btn btn-danger" onclick="window.open('#', '_self');">
      Add services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
      <form id="sform" method = "post" action="/carwashms/admin/admin.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Service to be added.</label>
          <input type="text" class="form-control" id="addser" name="addser">
        </div>
        <input type = "submit" name="ser_btn" value="Create">
      </form>
    </div>
    <div><br>


      <button id = "btnu" type="button" style= "margin : 10px;" class="btn btn-success" onclick="window.open('#', '_self');">
      Add admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
      <form id="uform" method = "post" action="/carwashms/admin/admin.php">
        <div class="mb-3">
        <label for="addadmin">Select user to grant admin access.</label>
          <select class="form-control" id = "addadmin" name="addadmin">
            <?php 
            $sql = "select * from users where role = 0";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
              <option value = "<?php echo $row['username'];?>"> <?php echo $row['username']; ?> </option>
            <?php 
            }
            ?>
          </select>
        </div>
        <input type = "submit" name="admn_btn" value="Grant">
      </form><br><br><br><br><BR><BR><BR>
      <div id="warnn" class="alert alert-warning" role="alert">
      <?php 
      if($adm){echo $adm;}
      elseif($loc){echo $loc;}
      elseif($adm){echo $adm;}
      elseif($serv){echo $serv;}
      elseif($msg){echo $msg;}
      else{echo'All notifications and updates to database will be shown here.';}
      ?>
      </div>
    </div>


    </div>
    <div class="col-sm"><br><br>
      <form method="post" action="/carwashms/admin/admin.php">
        <div class="form-group">
          <label for="pending_request">Select booking request</label>
          <select class="form-control" style="width:50%;" id = "inputstate" name="pending_request">
            <option value = "0" selected>Select</option>
            <?php 
            $sql = "select * from bookings where status = 0";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
              <option value = "<?php echo $row['bookingid'];?>"> <?php echo $row['name']; ?> </option>
            <?php 
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="updated_status">Status (Accept or Reject)</label>
          <select class="form-control" style="width:50%;" id = "inputstate" name="updated_status">

          <option value = "0">Leave Pending</option>
          <option value = "1">Accept</option>
          <option value = "-1">Reject</option>

          </select><br>
          <input type="submit" name="submit_btn" value="Submit">
        </div>
        <div><p></p></div>
      </form>
    </div>


    <div class="col-sm"><br><br>
      <img src = "third.jpg" id="third">
    </div>
  </div>
</div>
<?php
    if(!$loggedin){
        echo ("<script LANGUAGE='JavaScript'> window.alert('Session expired. Please re-login.');
        window.location.href='../index.php';
        </script>");
    }
    ?>
    
    
<script src="admin.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>