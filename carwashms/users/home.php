<?php
require '../logincheck.php';
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
    
    <title>Home</title>
  </head>
  <body>
    <?php require '../nav.php' ?><br>

    <div class="container">
  <div class="row align-items-start">
    <div class="col">
    <?php 
    if($loggedin){
    echo'<section style="background: url(cover.jpg);
    background-size: cover;
    height: calc(100vh - 80px);"><div class="prof">';

    require '../connect.php';

    $sql = "SELECT * FROM `profile` WHERE user='$_SESSION[username]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<h2 align="left" fonctcolor>Welcome ';
    echo  $row["user"].'.<br>';
    echo 'Name: '. $row["fname"]. ' '. $row["lname"]. '<br></h2>';
    echo '</div></section>';
    
    }
    else{
      echo ("<script LANGUAGE='JavaScript'> window.alert('Session expired. Please re-login.');
      window.location.href='index.php';
      </script>");
    }
    
    
    ?>
    </div>
    <div class="col">
      <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis purus sit amet porta accumsan. Mauris consectetur velit convallis augue posuere finibus. Nulla facilisi. Sed tempus purus arcu, at tristique enim porttitor id. Ut mollis dapibus turpis, volutpat semper nulla. Cras vel metus accumsan, facilisis sem nec, cursus eros. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Curabitur dignissim quam in nibh ornare, eu varius purus dictum. Vivamus sed felis vitae dolor auctor ullamcorper eu non mauris. Suspendisse lobortis tincidunt quam ac sagittis. Duis convallis dolor in magna vestibulum pretium. Etiam ante mi, suscipit in feugiat id, convallis sed enim. Donec cursus leo mi, non condimentum urna suscipit ut. Morbi et lobortis dui, at eleifend nisl. Fusce arcu nisl, fringilla a risus ac, porta mattis lacus. Nulla cursus nisi tellus, sed condimentum dui mattis feugiat. Phasellus sit amet consectetur neque. In dictum nibh erat, ac feugiat enim ultrices at. Aliquam quis metus eget dolor ornare placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus.

      </p>
    </div>
    <div class="col">
      <img id = "homeimg" src="homeimg.jpg">
    </div>
  </div>
</div>

    
    
    
    

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>