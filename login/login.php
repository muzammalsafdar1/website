<?php
session_start();
$con = mysqli_connect('localhost','root','','website');
if(isset($_SESSION['email'])){
  header('location:../user_profile\user_profile.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
<link rel="stylesheet" href="login.css">
<title>Title</title>
</head>
<body>
 <div class="container">
   <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 m-auto main">
      <h1>Login Here</h1>
     
      <form action="" method="POST">
        
          <div class="input-div"><input type="text" class="form-control email " placeholder="Write Your Email Address" name="email">
            
            <span id="email"><i class="fas fa-at"></i></span>
          </div>
          <div class="input-div pass-div">
          
            <input type="password" placeholder="Write Password" class="form-control pass" name="pass">
 
            <span id="span"><i id="show-hide" class="fas fa-eye"></i></span>
            <span id="password"><i class="fas fa-lock"></i></span>
          </div>
          <div class="div-rem">
            <input type="checkbox"  class="remember" name="remember">Remember me
            
          </div>
          <span id="anchor"><a href="#">Forget Password?</a></span>
          <div><input type="submit" class="form-control submit" value="Submit" name="submit">
        </div>
      </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
      if(isset($_SESSION['email'])){
        header('location:../user_profile\user_profile.php');     
       }else{
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $pass1 = mysqli_real_escape_string($con,htmlentities(trim($pass)));
    
      $sql = "select first_name, last_name, email, password, status from websignup where email='{$email}'";
      $query = mysqli_query($con,$sql);
      $row = mysqli_num_rows($query);
        if($row==1){
         while($result = mysqli_fetch_assoc($query)){
          
            if(password_verify($pass1, $result['password'])){
              
              $online = "update websignup set status='online' where email='{$email}'";
              $_SESSION['id']=$result['id'];
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $pass;
              $_SESSION['firstname']=$result['first_name'];
              $_SESSION['lastname']=$result['last_name'];
              $queryonline  = mysqli_query($con,$online);
              header('location:../user_profile\user_profile.php');
            }
         }

        }else{echo "Record Not found";}
       }
    }
   ?>
  </div>
   </div>
  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>