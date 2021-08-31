<?php

$con = mysqli_connect('localhost','root','','website');

?>
<html>
 <form action="" method="POST">
        
        <div class="input-div"><input type="text" class="form-control email " placeholder="Write Your Email Address" name="email">
          
          <span id="email"><i class="fas fa-at"></i></span>
        </div>
        <div class="input-div pass-div">
        
          <input type="password" placeholder="Write Password" class="form-control pass" name="password">

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
    $email = $_POST['email'];
    $password = $_POST['password'];
$sql = "select email, password from websignup where email='{$email}' and password='{$password}'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_num_rows($query);
    if($query){
      if($row==1){
      header('location:../user_profile\user_profile.php');
      }else{echo "no found";}
    }else{echo "sorry";}
  }
 ?>
</div>
 </div>
 </html>


