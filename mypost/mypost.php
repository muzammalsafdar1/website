<?php
// session_start();
$con = mysqli_connect('localhost','root','','website');
$sql3 = "select * from websignup where email='$_SESSION[email]'";
$query3 = mysqli_query($con,$sql3);
$result3 = mysqli_fetch_assoc($query3);
$user_id = $result3['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="mypost.css">
  <title>Document</title>
</head>
<body>
<div class="update-post-form">
         <form action="" method="POST" enctype="multipart/form-data">
              <textarea name="post" class="txt" style="color:black;">
  
              </textarea>

    </div>
    <div id='post-pic' style="color:black;">
    <input type="file" name="pics" accept="image/x-png,image/gif,image/jpeg"/>
    </div>
    <div>
    <input type="submit" name="post-submit" value="Submit" class="submit-post-btn" style="color:black;">
</div>
</form>
<?php

if(isset($_FILES['pics'])){
  $post = $_POST['post'];
  $file_name = $_FILES['pics']['name'];
  $file_size =$_FILES['pics']['size'];
  $temp_name =$_FILES['pics']['tmp_name'];
  $file_type =$_FILES['pics']['type'];
  $folder = "pics/".$file_name;
  $sql_post = "insert into pics(gallery,post,user_id) values('{$folder}','{$post}',$user_id)";
  $query_post = mysqli_query($con, $sql_post);
  if($query_post){
  move_uploaded_file($temp_name,$folder);
  }
}

?>
</body>
</html>