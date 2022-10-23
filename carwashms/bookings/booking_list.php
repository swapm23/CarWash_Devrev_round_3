
<?php
require '../logincheck.php';
require '../connect.php';
$curr_user = $_SESSION['username'];
$role = $_SESSION['role'];

// if($role==0){
//   $sql = "SELECT * FROM bookings where user = '$curr_user'";
// }
// else{   
//   $sql = "SELECT * FROM bookings where service='carwash'";
// }
// $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
 
  
    <title>Booking List</title>
  </head>
  <body>
    <?php require '../nav.php'; ?>
  <!-- <section style="background: url(../cover.jpg);
    background-size: ../cover;
    height: calc(110.7vh - 80px);"> -->
  <div class="prof container">
    <div>
      <h2 class="text-left" style="margin: 30px 0px 0px -70px; text-decoration: underline; text-align: center;" >
        List of Bookings
      </h1>
    </div>
    <br>
    <table  id="table_id" class="display  table table-hover table-success">
    <thead>
      <tr>
        <th class="bg-success" scope="col">Booking_ID</th>
        <th class="bg-success" scope="col">Booking For</th>
        <th class="bg-success" scope="col">Date</th>
        <th class="bg-success" scope="col">Location</th>
        <th class="bg-success" scope="col">Status</th>
        <th class="bg-success" scope="col">Service</th>
        <th class="bg-success" scope="col">Booked By</th>
      </tr>
    </thead>
    <tbody>
    <?php
      // while($row = mysqli_fetch_assoc($result)){
      //   if($row["status"]==0){
      //     $s = "Pending";
      //   }
      //   elseif($row["status"]==1){
      //     $s = "Confirmed";
      //   }
      //   elseif($row["status"]==-1){
      //     $s = "Canceled";
      //   }
      //   echo '
      //   <tr>
      //     <th scope="row">'.$row["bookingid"].'</th>
      //     <td>'.$row["name"].'</td>
      //     <td>'.$row["date"].'</td>
      //     <td>'.$row["location"].'</td>
      //     <td>'.$s.'</td>
      //     <td>'.$row["service"].'</td>
      //     <td>'.$row["user"].'</td>
      //   </tr>';}
      
      ?>
      <?php
       if($role == 1){
        $sql="select * from bookings";
        $result = mysqli_query($conn, $sql);
        
      while($row = mysqli_fetch_assoc($result)){
      ?>
       <tr>
          <th scope="row"><?=$row["bookingid"]?></th>
          <td><?=$row["name"]?></td>
          <td><?=$row["date"]?></td>
          <td><?=$row["location"]?></td>
          <td><?=$row["service"]?></td>
          <td><?=$row["user"]?></td>
          <?php if($row["status"]==1){?>
          <td>Confirmed</td>
          <?php }elseif($row["status"]==0){?>
          <td>Pending</td>
          <?php }elseif($row["status"]==-1){?>
          <td>Rejected</td>
          <?php }?>
          
        </tr>
        <?php }}
        else{
          $sql="select * from bookings where user='$curr_user'";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            ?>
             <tr>
                <th scope="row"><?=$row["bookingid"]?></th>
                <td><?=$row["name"]?></td>
                <td><?=$row["date"]?></td>
                <td><?=$row["location"]?></td>
                <td><?=$row["service"]?></td>
                <td><?=$row["user"]?></td>
                <?php if($row["status"]==1){?>
                <td>Confirmed</td>
                <?php }elseif($row["status"]==0){?>
                <td>Pending</td>
                <?php }elseif($row["status"]==-1){?>
                <td>Rejected</td>
                <?php }?>
                
              </tr>
            <?php }}   ?>   
      </tbody>
    </table>
  </div> 
   <!-- <button class = "btn btn-success" onClick="window.location.reload();">Get updated status</button> -->
   <?php
    if(!$loggedin){
      echo ("<script LANGUAGE='JavaScript'> window.alert('Session expired. Please re-login.');
      window.location.href='../index.php';
      </script>");
    }
  ?>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>  
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
 
  
  
  </body>
</html>