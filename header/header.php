<?php

$con = mysqli_connect('localhost', 'root', '', 'website');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Asap&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <title>Document</title>
</head>
<body>
  <div class="header-main">
    <div class="title-logo">My Date</div>
      <div class="listitems">
        <ul class="ul-class">
        <a class="linking" href="..\user_profile/timeline.php" style="text-decoration:none;">Time Line</a>
         <li class="items"><a href="" class="linking">notifications</a>
          </li>
          <li class="items"><a class="linking" href="..\user_profile/user_profile.php" style="text-decoration:none;"><i class="fas fa-home"></i> Home</a></li>
          <li class="items"><a class="linking" href="..\user_search/user_search.php" style="text-decoration:none;"><i class="fas fa-search"></i> Search</a></li>
          <li class="items"><a class="linking" href="#" style="text-decoration:none;"><i class="far fa-edit" ></i> Our Mission</a></li>
          <li class="items"><a class="linking" href="#" style="text-decoration:none;">About Us</a></li>
          <li class="items"><a class="linking" href="#" style="text-decoration:none;"><i class="fas fa-headset"></i> Live Support</a></li>
        </ul>
      </div>
      <?php
        if(isset($_SESSION['email']) && isset($_SESSION['password'])){
          echo "<div class='log sign-in'><a href='..\login/logout.php' style='text-decoration:none;'><i class='fas fa-sign-out-alt'></i><br> Sign out</a></div>";
          
        }else{
          echo "<div class='log sign-in'><a href='..\login/login.php' style='text-decoration:none;'><i class='fas fa-sign-in-alt'></i><br> Sign In</a></div>
          <div class='log sign-up'><a href='..\signup/signup.php' style='text-decoration:none;'><i class='fas fa-user-plus'></i> <br> Sign Up</div></a>";
        }
      
      ?>
    
  </div>
  
</body>
</html>