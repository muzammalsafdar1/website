<?php
session_start();
$con = mysqli_connect('localhost','root','','website');
$sql5 = "select * from websignup";
$query5 = mysqli_query($con,$sql5);
$result5 = mysqli_fetch_assoc($query5);
$id = $result5['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="user_profile_css/user_profile.css" type="text/css">
<link rel="stylesheet" href="..\header/css/header.css" type="text/css">
  <link rel='stylesheet' href='..\mypost/mypost.css'> 
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include_once('..\header/header.php');
?>
<div class="display-user-posts">
<div class="full-screen-popup-post"></div>
                                   <!-- first post -->
                                   <?php
                              $sql_post = "select * from pics order by id DESC";
                              $post_query = mysqli_query($con,$sql_post);
                              if($row=mysqli_num_rows($post_query)>0){
                                   while($post_result=mysqli_fetch_assoc($post_query)){
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
                    
</body>
</html>