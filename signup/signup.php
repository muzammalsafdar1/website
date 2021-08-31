<?php

$con   = mysqli_connect('localhost', 'root', '', 'website');
$_POST['optradio']= '';

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
<link rel="stylesheet" href="signup.css">
<script src="signup.js"></script>

<title>love</title>

</head>
<body>
  <div class="container-fluid header">
   <a href="../index\index.php"> <i class="fas fa-home"></i></a>
    </div>
  
<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-9 col-sm-12  main">
              <h1 class="text-center">Signup Here</h1> <br>
              <div class="col-12 text-center fb"><img src="ficon.svg">SignUp with Facebook</div> <br>
              <div class="col-12 text-center fb google"><img src="gicon.svg">SignUp with Google Account</div> <br>
          <form action="" method="POST">
            <div class="form-group">
             
              <input type="text" placeholder="First Name" class="form-control" id="first_name" name="fname"><label id="firstname_msg"></label>
            </div>
            <div class="form-group">
              
              <input type="text" placeholder="Last Name" class="form-control"  id="last_name" name="lname"><label id="lastname_msg"></label>
            </div>
            <div class="container">
              <div class="row">
                Gender
                <div class="form-check ml-auto  col-2">
                
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio" value="male" id="radio1">Male
                  </label>
                </div>
                <div class="form-check col-2">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio" value="female" id="radio2">Female
                  </label>
                </div>
                <div class="col-1"></div>
              </div>
            </div> <br>
            <div class="form-group">
              
              <input type="email" id="email" placeholder="Email Address" class="form-control" id="email" name="email">
            </div>
            
            <div class="form-group">
              
              <input type="text" placeholder="Chose Password" class="form-control" id="pwd" name="password">
              <label id="pass_msg"></label>
            </div>
            <div class="form-group">
              
              <input type="password" id="re_pwd" name="repassword" placeholder="Retype Password" class="form-control"><label id="repass_msg"></label>
            </div>
            <div class="form-group">
              
              <input type="date" placeholder=""  id="dob" class="form-control" name="dob">
            </div>
            <div class="form-group"  class='select-values'>
              
              <?php
                    $country_code = "SELECT phonecode from country";
                    $code_query = mysqli_query($con,$country_code);
                    $code_row = mysqli_num_rows($code_query);
                    if($code_row){
                       echo "<select name='countrycode' class='custom-select'>";
                       while($code_result = mysqli_fetch_assoc($code_query)){
                         echo "<option>+$code_result[phonecode]</option>";
                       }
                       echo "</select>";
                    }
                    
                    

              ?>
              <label id="pass_msg"></label>
            </div>
            <div class="form-group">
              
              <input type="text" placeholder="Phone Number" id="phone" class="form-control" name="phone"><label id="phone_mgs"></label>
            </div>
            <div class="form-group">
              
            
            <input type="hidden" value="offline" name="status">
            <button type="submit" id="submit" class="btn btn-danger col" name="submit">Submit</button>
          </div>
          </form>
         <?php
         if(isset($_POST['submit'])){
           $fname = mysqli_real_escape_string($con,htmlentities(trim($_POST['fname'])));
           $lname = mysqli_real_escape_string($con,htmlentities(trim($_POST['lname'])));
           $email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
           $gender = $_POST['optradio'];

           $pass = $_POST['password'];
           $password = mysqli_real_escape_string($con,htmlentities(password_hash(trim($pass),PASSWORD_DEFAULT)));
           $cpassword = mysqli_real_escape_string($con,htmlentities(password_hash(trim($pass),PASSWORD_DEFAULT)));
           $dob = $_POST['dob'];
           $countrycode = $_POST['countrycode'];

           $phone = mysqli_real_escape_string($con,htmlentities(trim($_POST['phone'])));
           $fullphone = $countrycode.$phone;
          //  $country = mysqli_real_escape_string($con,htmlentities(trim($_POST['country'])));

          //  $city = mysqli_real_escape_string($con,htmlentities(trim($_POST['city'])));
           $status = mysqli_real_escape_string($con,htmlentities(trim($_POST['status'])));

        
      
          if(!preg_match('/^[A-Za-z ]{3,}$/',$fname) && !preg_match('/^[A-Za-z ]{3,}$/',$lname) || !preg_match('/^[0-9]{8,15}$/',$phone)){
            
          }else{
            $sql = "insert into websignup(first_name,last_name,gender,email,password,re_password,dob,phone, status) values('{$fname}','{$lname}','{$gender}','{$email}','{$password}','{$cpassword}','{$dob}','{$fullphone}','{$status}')";
           
           
            $query = mysqli_query($con,$sql);
            if($query){
              $id = mysqli_insert_id($con);
              
              
              $fk_id = "insert into info(info_fk) values($id);";
              $fk_id .=  "insert into interest(interests_fk) values($id)";
              $fk_query = mysqli_multi_query($con,$fk_id);
              
              if($fk_query){

                ?>
                <script>window.location.replace('../login/login.php');</script>
                             <?php
                  
              }
             
            }
          }
         }
        
         ?>
        </div>
    </div> <br>
</div>
<div><img src="bg.jpg" alt=""></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>