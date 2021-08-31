<?php

$con = mysqli_connect('localhost','root','','website');
$_SESSION['email']= $email;
$fk_sql = "select * from info inner join websignup on info.info_fk=websignup.id where
email='{$_SESSION['email']}'";

$fk_query = mysqli_query($con,$fk_sql);
$row = mysqli_num_rows($fk_query);

$result_fk = mysqli_fetch_assoc($fk_query);
$fk_id = $result_fk['info_fk'];

$name_sql= "select first_name, last_name from websignup where email='{$_SESSION['email']}'";
$name_query = mysqli_query($con,$name_sql);
$name_fetch = mysqli_fetch_assoc($name_query);

// profile pic and cover pic id selector
$sql_id = "select id from websignup where email='$_SESSION[email]'";
                    $query_id = mysqli_query($con,$sql_id);
                    $result_pic_id = mysqli_fetch_assoc($query_id);
                    $profile_id = $result_pic_id['id'];
                    


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../user_profile_css\user_profile.css" type="text/css">

  <title>Document</title>
</head>
<body>
                                      <!-- cover picture pop-up -->
  
<div class="full-screen"></div>
<div class="upload-picture-div">
     <div class="edit-cover-picture-form">
          <form action="" method="post" enctype="multipart/form-data">
        
               <input type="file" name="coverpicture" class="edit-coverpicture"> <br> <br>
               <input type="submit" name="submit" value="Upload" class="submit-cover-picture" style="color:black;">
          </form>
          <?php
               if(isset($_FILES['coverpicture'])){
                    $cover_name = $_FILES['coverpicture']['name'];
                    $cover_tmp = $_FILES['coverpicture']['tmp_name'];
                    $cover_type = $_FILES['coverpicture']['type'];
                    $cover_size = $_FILES['coverpicture']['size'];
                    $cover_folder = "coverpic/".$cover_name;
                    $cover_sql = "insert into cover_pic(cover_pic,cover_id) values('{$cover_folder}', $profile_id)";
                    $cover_query = mysqli_query($con,$cover_sql);
                    if($cover_query){
                         move_uploaded_file($cover_tmp,$cover_folder);
                    }
               }
          ?>
     </div>
     <div class="display-edited-picture"></div>
</div>
  </div>



                                      <!-- profile picture pop-up -->



  <div class="full-screen-for-profile"></div>
<div class="upload-picture-div-profile">
     <div class="edit-profile-picture-form">
          <form action="" method="post" enctype="multipart/form-data">
               <input type="file" name="profilepicture" class="edit-profilepicture"> <br> <br>
               <input type="submit" name="submit" value="Upload" class="submit-profile-picture" style="color:black;">
          </form>
          
          <?php
               if(isset($_FILES['profilepicture'])){
                    
                    $fname = $_FILES['profilepicture']['name'];
                    $tmp_name = $_FILES['profilepicture']['tmp_name'];
                    $filesize = $_FILES['profilepicture']['size'];
                    $filetype = $_FILES['profilepicture']['type'];
                    $folder = "profile_pics/".$fname;
                    $sql_profile_pic = "insert into profile_pic(profile_pic,profile_pic_id) values('{$folder}',$profile_id)";
                    $profile_pic_query=mysqli_query($con,$sql_profile_pic);
                    if($profile_pic_query){
                    move_uploaded_file($tmp_name,$folder);
                    }
               }
          
          ?>
     </div>
     <div class="display-edited-profile-picture"></div>
</div>
  </div>


                    <!-- edit name status and info pop-up -->

 <div class="full-sceen-name-status"></div>
     <div class="edit-name-status-info">
          <div class="edit-all-info">
          <form action="" method="post">
          <input type="text" name="firstname" value="<?php echo $name_fetch['first_name']; ?>" style="color:black;"> <br><br>
          <input type="text" name="lastname" value="<?php echo $name_fetch['last_name']; ?>" style="color:black;"> <br><br>

          
               <input type="submit" name="edit-name" value="Update" class="submit-namestatusinfo" style="color:black;">

          </form>
          <?php
          if(isset($_POST['edit-name'])){
               $fname = $_POST['firstname'];
               $lname = $_POST['lastname'];
               $editnamesql = "update websignup set first_name='{$fname}', last_name='{$lname}' WHERE email='{$_SESSION['email']}'";
               $editnamequery = mysqli_query($con,$editnamesql);
               if($editnamequery){
                    ?>
               <script>window.location.replace('user_profile.php')</script>
                    <?php
               }
          }
          ?>
          </div>
     </div>



                                        <!-- user-interest-popup-css -->


<div class="full-screen-user-interest"></div>
<div class="user-interest-popup-div">
<form action="" method="POST">


     <div class="user-interest-form">
<div class="only-checkbox">
<?php

echo "<div class='custom-control custom-switch user-interest-switch'>";
$checkbox = array("Biking", "Cooking", "Fashion", "Hobbies And Crafts", "Meditation And Youga", "Music And Concerts", "Reading", "Sports", "Camping", "Dancing", "Fishing And Hunting", "Movies", "Video Games", "Lying On The Beach", "Watching Films", "Photography", "Swiming", "Politics", "Eating", "Traveling", "Historical Places");
$i=1;

foreach($checkbox as $key=>$value){
    
     ?>
     <div class="custom-control custom-switch user-interest-switch">
     <input type='checkbox' class='custom-control-input' id='<?php echo 'switch'.$i?>' name='interests[]' value="<?php echo $value ?>">
     <label class='custom-control-label' for='<?php echo 'switch'.$i;?>'><?php echo $value?></label>
</div>
     <?php
      $i++;
 }

     ?>

  <div class="button-div">
       <input type="submit" name="submit-check" class="submit-checkbox" value="Submit" >
  </div>

     </div>
     </form>
     <?php
          if(isset($_POST["submit-check"])){
               $intrst = $_POST['interests'];
               $interests = implode(',',$intrst);
               $interestsql = "UPDATE interest SET interests='{$interests}' WHERE interests_fk=$fk_id";
               $interestquery = mysqli_query($con,$interestsql);
               if($interestquery){
                    ?>
     <script>window.location.replace('user_profile.php')</script>
                    <?php
               }
          }
     
     ?>
</div>
  </div>
</div>


                                                  <!-- about me pop-up -->

 <div class="full-screen-for-aboutme"></div>
<div class="about-me-div">
     <div class="edit-aboutme-form">
          <form action="" method="post">
             <div class="key-value-div">
                 <div class="key-words">
                      <!-- about me left side values -->
                    <?php
                    $about =  array("Country", "City", "Profession", "Education", "Institute",  "Relationship", "Have Kids", "Smoke", "Drink", "Body Type", "Eye Color", "Hair Color","Languages");
                    foreach($about as $key=>$value){
                        echo "<div class='option-words' name=''>$value</div>"; 
                    }
                    ?>

                 </div>
                 <!-- about me right side values -->
                 <div class="option-values">
                      <!-- country -->
                      <div class="select-values">

                              <?php
                                        $sql = "select name from country";
                                        $query = mysqli_query($con,$sql);
                                   if($row = mysqli_num_rows($query)>0){
                              echo "<select name='country' id='' class='custom-select'>";
                               while($result = mysqli_fetch_assoc($query)){
                         echo "<option value='$result[name]' selected>$result[name]</option>";
                                        }
                                   }
                             echo "</select>";
                             $countrysql = "insert into"
                           ?>
                      </div>
                      <div class="select-values">
                           <!-- city -->
                      <div class="form-group">
                         <input type="text" class="form-control" placeholder="City Name" name="city">
                        
                         </div>
                    </div>
                    <!-- work as -->
                    <div class="select-values">
                          
                      <div class="form-group">
                         <input type="text" class="form-control" placeholder="City Name" name="work">
                        
                         </div>
                    </div>
                    <!-- professions -->
                      <div class="select-values">
               <?php
               $profession = array("Accountant" ,"Actor /Actress", "Architect", "Author", "Chef/Cook", "Dentist", "Designer", "Doctor ", "Engineer", "Hairdresser ", "Journalist ", "Lecturer ", "Model ", "Nurse ", "Painter ", "Teacher", "other");
                echo "<select name='profession' id='' class='custom-select'>";
                foreach($profession as $key => $value){
                    echo "<option value='$value'>$value</option>";
               
                }
                echo "</select>";
               
               ?>
                           
                      </div>
                      <!-- education -->
                      <div class="select-values">
                           <?php
                         $education = array("Associate degree","Bachelor's degree","Master's degree","Doctoral degree","other");
                         echo "<select name='education' id='' class='custom-select'>";
                         foreach($education as $key=>$value){
                             echo  "<option value='$value'>$value</option>";
                         }
                           ?>

                           </select>
                      </div>
                      <!-- institute -->
                      <div class="select-values">
                      <input type="text" name="institute" class="form-control" placeholder="Instute Name">

                      </div>
                      
                      <!-- relationship -->
                      <div class="select-values">
                           <?php
                         
                              $relstionship = array("Single ", "Widowed", "Separated ", "Divorced ", "Married");
                              echo "<select name='relationship' id='' class='custom-select'>";
                              foreach($relstionship as $key => $value){
                              echo "<option value='$value'>$value</option>";
                             
                              }
                              echo "</select>";
                           ?>
   
                      </div>

                      <div class="select-values">
                           <?php
                              $kids = array("No","Yes");
                              echo "<select name='kids' id='' class='custom-select'>";
                              foreach($kids as $key=>$value){
                                   echo "<option value='$value'>$value</option>";
                              }
                              echo "</select>";
                           ?>
                           
                      </div>
                      <!-- smoking -->
                      <div class="select-values">
                           <?php
                         $smoke = array("No","Yes");
                         echo "<select name='smoke' id='' class='custom-select'>";
                         foreach($smoke as $key => $value){
                              echo "<option value='$value'>$value</option>";
                         }
                         echo " </select>";
                           ?>

                      </div>
                       <!-- drink -->
                       <div class="select-values">
                           <?php
                         $drink = array("No","Yes");
                         echo "<select name='drink' id='' class='custom-select'>";
                         foreach($drink as $key => $value){
                              echo "<option value='$value'>$value</option>";
                         }
                         echo " </select>";
                           ?>
                      </div>

                       <!-- body type -->
                       <div class="select-values">
                           <?php
                           $bodytype = array("slim", "fat", "average", "skinny", "muscular");
                           echo "<select name='bodytype' id='' class='custom-select'>";
                           foreach($bodytype as $key=>$value){
                                echo "<option value='$value'>$value</option>";
                           }
                           echo "</select>";
                           ?>
                      </div>
                      <!-- eye color -->
                      <div class="select-values">
                           <?php
                           $eyecolor = array("amber","Black", "blue", "brown", "gray", "green", "hazel", "other");
                           echo "<select name='eyecolor' id='' class='custom-select'>";
                           foreach($eyecolor as $key=>$value){
                              echo "<option value=$value>$value</option>";
                           }

                           echo "</select>";
                           ?>
                      </div>
                      <!-- hair color -->
                      <div class="select-values">
                           
                      <?php
                      $haircolor = array("Brown ", "Blond ", "Black ", "Auburn ", "Red ", "Gray ", "white ", "other");
                      echo "<select name='haircolor' id='' class='custom-select'>";
                      foreach($haircolor as $key=>$value){
                           echo "<option value='$value'>$value</option>";
                      }
                      echo "</select>";
                      ?>
                      </div>
                      <!-- language -->
                      <div class=" languages">
                           <?php
               $languages = array("English ", "Chinese ", "Spanish ", "Hindi ", "Arabic ", "Portuguese", "Bengali ", "Russian", "Japanese ", "German ", "French ", "Turkish ", "Vietnamese ", "Urdu", "Greek", "Bulgarian", "Romanian", "Crotian", "Hungarian", "Polish", "other");
               $a=0;
               foreach($languages as $key => $value){
                    
                    ?>
                    <div class="custom-control custom-switch user-interest-switch">
                    <input type='checkbox' class='custom-control-input' id=<?php echo "lang".$a ?> name=lang[] value="<?php echo $value?>">
                    <label class='custom-control-label' for='<?php echo "lang".$a ?>'><?php echo $value?></label>
                    </div>
                    <?php $a++; ?>
              <?php } ?>

               
                         
                      </div>
                              <!-- button -->

          <input type="submit" name="submit" class="submit" value="Submit" style="color:black;">

                 </div>
             </div>
          </form>
          <?php
          if(isset($_POST['submit'])){
               $country = $_POST['country'];
               $city = mysqli_real_escape_string($con,htmlentities($_POST['city']));
               $work = $_POST['work'];
               $education = $_POST['education'];
               $institute = mysqli_real_escape_string($con, htmlentities($_POST['institute']));
               $relationship = $_POST['relationship'];
               $kids = $_POST['kids'];
               $smoke = $_POST['smoke'];
               $drink = $_POST['drink'];
               $bodytype = $_POST['bodytype'];
               $eyecolor = $_POST['eyecolor'];
               $haircolor = $_POST['haircolor'];
               $lang = $_POST['lang'];
               $languages = implode(',',$lang);
               
               $sql_info = "UPDATE info set  country='{$country}',city='{$city}', work='{$work}', education='{$education}', institute='{$institute}', languages='{$languages}', kids='{$kids}',  smoke='{$smoke}', drink='{$drink}', relationship='{$relationship}', bodytype='{$bodytype}', eyecolor='{$eyecolor}', haircolor='{$haircolor}' where info_fk=$fk_id";  
               $query_info = mysqli_query($con,$sql_info);
               if($query_info){
                   ?>
               <script>window.location.replace('../user_profile/user_profile.php')</script>
                   <?php
               }

          }
          
          ?>
     </div>
</div>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php 
mysqli_close($con);
?>
</body>
</html>