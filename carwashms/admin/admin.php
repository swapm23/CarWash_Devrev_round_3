
<?php
    require '../logincheck.php';
    require '../connect.php';
    $msg = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["pending_request"] == 0){
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
      <button type="button" style= "margin : 10px;" class="btn btn-info" onclick="window.open('#', '_self');">
      Add locations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
    </div>
    <div><br>
      <button type="button" style= "margin : 10px;" class="btn btn-danger" onclick="window.open('#', '_self');">
      Add services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
    </div>
    <div><br>
      <button type="button" style= "margin : 10px;" class="btn btn-success" onclick="window.open('#', '_self');">
      Add admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </button>
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

          <option value = "0">Keep Pending</option>
          <option value = "1">Accept</option>
          <option value = "-1">Reject</option>

          </select><br>
          <input type="submit" name="submit" value="Submit">
        </div>
        <div><p><?php if($msg){echo $msg;} ?></p></div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>