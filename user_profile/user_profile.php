<?php
session_start();
$con = mysqli_connect('localhost','root','','website');
$sql = "select * from websignup where email='{$_SESSION['email']}'";

$query = mysqli_query($con,$sql);
     
     $result=mysqli_fetch_assoc($query);
     $id = $result['id'];
     $status =   $result['status'];

$email = $_SESSION['email'];
$password = $_SESSION['password'];
$firstname = $result['first_name'];
$lastname = $result['last_name'];
if(!isset($email)){
     header('location:../login\login.php');

}
// About me
$sqlinterests = "select * from info inner join websignup on info.info_fk=websignup.id where email='{$_SESSION['email']}'";
$queryinterests = mysqli_query($con,$sqlinterests);
$resultinterests = mysqli_fetch_assoc($queryinterests);
if(!isset($resultinterests['country']) || !isset($resultinterests['city']) ||!isset($resultinterests['work']) ||!isset($resultinterests['education']) ||!isset($resultinterests['institute']) ||!isset($resultinterests['languages']) ||!isset($resultinterests['relationship']) ||!isset($resultinterests['kids']) ||!isset($resultinterests['smoke']) ||!isset($resultinterests['drink']) ||!isset($resultinterests['bodytype'])||!isset($resultinterests['eyecolor'])||!isset($resultinterests['haircolor'])){
$resultinterests['country']='';
$resultinterests['city']='';
$resultinterests['work']='';
$resultinterests['education']='';
$resultinterests['institute']='';
$resultinterests['languages']='';
$resultinterests['relationship']='';
$resultinterests['kids']='';
$resultinterests['smoke']='';
$resultinterests['drink']='';
$resultinterests['bodytype']='';
$resultinterests['eyecolor']='';
$resultinterests['haircolor']='';
}



$interest_sql = "select interests from interest inner join websignup on interest.interests_fk=websignup.id where
email='{$_SESSION['email']}'";
$interest_query = mysqli_query($con,$interest_sql);
$interest_row = mysqli_num_rows($interest_query);

// profile pic

$sql_profile = "SELECT * FROM profile_pic WHERE profile_pic_id=$id order by id DESC";
$query_profile = mysqli_query($con,$sql_profile);
if($query_profile){
$result_profile = mysqli_fetch_assoc($query_profile);
}
// if(!isset($result_profile['profile_pic'])){
//      $result_profile['profile_pic']='';
// }

// cover pic

$sql_cover = "select * from cover_pic where cover_id=$id order by id desc";
$query_cover = mysqli_query($con,$sql_cover);
// $row_cover = mysqli_num_rows($query_cover);
if($query_cover){
     $cover_result = mysqli_fetch_assoc($query_cover);
}
// if(!isset($cover_result['cover_pic'])){
//      $cover_result['cover_pic']='';
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="..\header/css/header.css" type="text/css">
  <link rel="stylesheet" href="user_profile_css/user_profile.css" type="text/css">
  <link rel='stylesheet' href='..\mypost/mypost.css'>
  <script src="user-profile-js/user-profile-js.js"></script>
  <title>Document</title>
</head>
<body>
    <?php include('..\header/header.php');  ?>

                   <!-- cover picture profile picture and display name -->

<div class="cover-picture-div">
    
    <div>
    <?php
    if(!isset($cover_result['cover_pic'])){
         $default_cover_sql = "select * from cover_pic where id=6";
         $default_cover_query = mysqli_query($con,$default_cover_sql);
         $default_cover_fetch = mysqli_fetch_assoc($default_cover_query);
         echo "<img class='cover-picture' src='$default_cover_fetch[cover_pic]' width=100% height=100%>";
    }else{
    echo "<img class='cover-picture' src='$cover_result[cover_pic]'width=100% height=100% >";
    }

    ?>
    </div> 
          <div class="user-profile-picture-div">
              <?php 
              
               if(!isset($result_profile['profile_pic'])){
                    $default_profile_sql = "select * from profile_pic where id=11";
                    $default_profile_query = mysqli_query($con,$default_profile_sql);
                    $default_profile_fetch = mysqli_fetch_assoc($default_profile_query);
                    echo "<img class='profile-picture' src='$default_profile_fetch[profile_pic]' width=100% height=100%>";
               }else{
               echo "<img class='profile-picture' src='$result_profile[profile_pic]' width=100% height=100%>";
               }

              
               ?>
               </div>
              <div class="display-name-status">

                    <?php
                    if($query){
                       mysqli_fetch_assoc($query);
                             echo "<div class='user-name'>$firstname $lastname</div>";
                         
                    }
                    ?>
               
             
                <div class="status-container">
                     <div class="status"> Status 
                          <i class="fas fa-circle " id="status-icon"></i>
                     </div>
                          <div class="last-online" ><?php echo $status; ?> <span>1 hour ago</span></div>



                         <!-- change or edit name info and status -->
                   
          <a href="#"> <div class="edit-status-name" name="edit-name"><i style="color:black;" class="far fa-edit"></i></div></a>
               
                    </div>
              </div>
</div>
                         <!-- change or edit cover picture icon-->

              <a href="#"><div class="edit-cover-picture"><i  class="far fa-edit"></i></div></a>






                               <!-- edit profile picture icon-->

     <a href="#"><div class="profile-picture-change-icon">
                <i  class="far fa-edit"></i>
     </div>
     </a>

     <?php include('pop-up/pop-up.php');

     ?>





                              <!-- My pictures and my friends  online friends  -->
     <div class="pics-friends-online">
   <div class="pic-fr-int-abt">
        <div class="pics-friends">
             <div class="users-pics-display">
                  <img src="user_profile_pictures/userp-pic.jpg" alt="" width="100%" height="100%">
               </div>
               
             <div class="users-friends">
             <div class="friends-edit"><i  class="far fa-edit" style="color:black;"></i></div>

             <div class="friend-first-row">
                  <div class="friends">
                  <img src="user_profile_pictures/friend1.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                  
                       <img src="user_profile_pictures/friend2.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend3.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend4.jpg" height="100%" width="100%" alt="">
                    </div> 
               </div>
                <div class="friend-second-row">
                  <div class="friends">
                       <img src="user_profile_pictures/friend5.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend6.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend7.jpg" height="100%" width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend8.jpg" height="100%" width="100%" alt="">
                    </div> 
                </div>
                <div class="friend-third-row">
                  <div class="friends">
                       <img src="user_profile_pictures/friend9.jpg" height="100%"   width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend10.jpg" height="100%"  width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend11.jpg" height="100%"  width="100%" alt="">
                    </div>
                  <div class="friends">
                       <img src="user_profile_pictures/friend12.jpg" height="100%" width="100%" alt="">
                    </div> 
                </div>
             </div>
               
        </div>
        <div class="interests-about-me">



                 

                 



                                             <!-- user interests -->



        
             <div class="user-interests">
                       <!-- user intersts pop-up -->

             <div class="user-interest-pop-up">
                          <a href="#"><i style="color:black;"  class="far fa-edit"></i></a>
                    </div>



                  <span id="interest-text">My Interests</span>
                  
                         <?php
                         if($interest_query){
                              $interest_fetch = mysqli_fetch_assoc($interest_query);
                              $array_interest = $interest_fetch['interests'];
                              // echo $array_interest;die(); string
                              $interest_array = explode(",",$array_interest);
                             
                         //     $fini = array_shift($interest_array);
                              // print_r($interest_array); die(); associative array
                              foreach($interest_array as $int){
                                  if($int==''){
                                       
                                  }else{
                                   echo "<span class='interest-icons'>$int</span>";
                                  }
                              }
                              
                         }
                             
                        
                         

                         ?>

</div>
             <div class="user-about-me"><p class="about-me-text">About me</p>
             

                                   <!-- about me pop-up button -->

                         <div class="about-me-popup-btn">
                         
                         <a href="#"><i style="color:black;"  class="far fa-edit"></i></a>
                                     </div>
                         <?php
                         
                              $data = array(
                                  
                              'Country'=>$resultinterests['country'], 
                              'City'=>$resultinterests['city'], 
                              'Work As'=>$resultinterests['work'], 
                              'Education'=>$resultinterests['education'], 
                              'Institute'=>$resultinterests['institute'],
                              'Languages' =>$resultinterests['languages'],
                              'Relationship'=>$resultinterests['relationship'], 
                              'Kids'=>$resultinterests['kids'],
                              'Smoke'=>$resultinterests['smoke'],
                              'Drink'=>$resultinterests['drink'],
                              'Body Type'=>$resultinterests['bodytype'], 
                              'Eyes Color'=>$resultinterests['eyecolor'], 
                              'Hair Color'=>$resultinterests['haircolor']
                         );
                              ?>
                                   <ul>
                              <?php foreach($data as $key=>$value){
                                   
                                   echo "<li class='about-me-items'>$key : $value</li>";
                              
                         }
                              echo "</ul>";
                         ?>


                  
               </div>
        </div>
   </div>

                                   <!-- online friends -->
<div style="display:flex; flex-direction:column;">
   <div class="online-friends">online Friends <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, sint repudiandae alias exercitationem aliquid, distinctio ex cum nihil quis veritatis rem quidem. Quos alias tempore provident, dignissimos libero non dolor. Lorem ipsum dolor sit amet consectetur
     </div>
     <div class="user-profile-ad">
          <img src="user_profile_pictures/friend3.jpg" height="100%" width="100%" style="object-fit:cover;" alt="">
     </div>
</div>
</div>
<div style='color:black; height:100px; width:100px; border:1px solid black;'>;alsdjgh</div>
                                   <!--update status or post -->
<div class="user-updat-status" style="color:black;">
<?php include('..\mypost/mypost.php');  ?>


</div>


                                   <!-- posts to display -->


     <div class="display-user-posts">
<div class="full-screen-popup-post"></div>
                                   <!-- first post -->



                                   <div id='data'>
                                        <?php
                                             $sq = "select * from "
                                        ?>
                                   </div>
                                   <?php include('user-profile-js/user-profile-js.php')  ?>
                                   <?php
                              $sql_post = "select * from pics where user_id=$id";
                              $post_query = mysqli_query($con,$sql_post);
                              
                             
                              if($row=mysqli_num_rows($post_query)>0){
                                   while($post_result = mysqli_fetch_assoc($post_query)){
                         echo "<div class='all-post-cont' id='$post_result[user_id]'>";
                         echo "<img src='$post_result[gallery]' width='100%' height='100%'>";
                         echo "<div>$post_result[post]</div>";
                         echo '<div class="post-container">
                         <div class="user-content">
                        
                         
                         </div>
                    <div class="like-comment-share-container">
                         <div class="like-div">  <span style="color:black;">28 </span> Like <i class="far fa-thumbs-up hover-color-change" style="color:black;"></i></div>

                         <div class="comment-div" id="1">  <span style="color:black;"></span>10 </span>  Comment <i class="far fa-comment hover-color-change" style="color:black;"></i></div>

                         <div class="share-div">  <span style="color:black;"></span>50 </span> Share <i class="fas fa-share hover-color-change" style="color:black;"></i></div>
                    </div>

                                        <!-- comment on post -->


                    <div class="comment-container" id="c1">
                         <div class="comment-pic-text-container">
                              <div class="comment-pic">
                                   <img src="user_profile_pictures/friend1.jpg" width="100%" height="100%" alt="">
                              </div>
                              <div class="user-comment-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus facere deleniti atque quae. Totam in adipisci quaerat deleniti 
                              <div class="options-container">
                                   <a href="#"><div class="comment-like">Like</div></a>
                                   <a href="#"><div class="comment-reply">Reply</div></a>
                                   <a href="#"><div class="comment-delete">Delete</div></a>
                                   <a href="#"><div class="comment-edit">Edit</div></a>
                              </div>
                              


                                        <!-- reply to the commetn -->

                         <div class="comment-pic-text-container">
                              <div class="comment-pic">
                                   <img src="user_profile_pictures/friend1.jpg" width="100%" height="100%" alt="">
                              </div>
                              <div class="user-comment-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus facere deleniti atque quae. Totam in adipisci quaerat deleniti 
                              <div class="options-container">
                                   <a href="#"><div class="comment-like">Like</div></a>   
                                   <a href="#"><div class="comment-reply">Reply</div></a> 
                                   <a href="#"><div class="comment-delete">Delete</div></a>    
                                   <a href="#"><div class="comment-edit">Edit</div></a>   
                              </div>
                              </div>
                              
                         </div>



                              </div>
                              
                         </div>
                   
                    <div class="comment-text-container">
                         <textarea id="comment" placeholder="Write your Comment here...."></textarea>
                    </div>
                    </div>
          </div>
      </div>
';

                                   }


                              }else{
                                   echo 'No posts yet';
                              }
                         ?>
                    
                              
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>