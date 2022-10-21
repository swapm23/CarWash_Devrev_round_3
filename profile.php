
<?php

include 'connect.php';

$sql = "SELECT * FROM `profile` WHERE user='$_SESSION[username]'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<h1 align="left" fonctcolor>Welcome ';
echo  $row["user"].'.<br>';
echo 'Name: '. $row["fname"]. ' '. $row["lname"]. '<br></h1>';

?>
