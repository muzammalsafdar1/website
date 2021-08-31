<?php
session_start();
$con = mysqli_connect('localhost','root','','website');
$country_sql = "select name from country";
$country_query = mysqli_query($con,$country_sql);
if(!isset($_POST['name']) || !isset($_POST['country']) || !isset($_POST['gender']) || !isset($_POST['check']) || !isset($check)){
  $_POST['name']='';
  $_POST['country']='';
  $_POST['gender']='';
  $_POST['check']='';
  $check='';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
<!-- external stylesheet -->
<link rel="stylesheet" href="assets/css/style.css">


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\header/css/header.css">
  <link rel="stylesheet" href="user_search_css/user_search_css.css">
  <link rel="stylesheet" href="..\footer/footercss/footercss.css">
  <title>Document</title>
</head>
<body>
<?php include('..\header/header.php');  ?>
 
 
 <div class="filter-search">
                            <!-- left side advertisement -->

  <div class="left-side">Left Advertisement</div>

                                <!-- search box in the middle  -->

  <div class="search-container">
        <div class="search-fields search">
          <form action="" method="POST">
            <input type="text" name='name' class="search-input" placeholder="Search By Name">
            <a href="#" class="search-emojy"><i class="fas fa-search a"></i></a>
              
        </div>
          <div class="search-fields">
            <h2><span>Search By Filter <span></h2>
          </div>
        <div class="search-fields">
          <?php
            
            if($country_query){
              echo "<select name='country'>";
              while($country_fetch = mysqli_fetch_assoc($country_query)){
                
              echo "<option >$country_fetch[name]</option>";
              
              }
              echo "</select>";
            }
            
          ?>
        </div>
        <div class="search-fields radio">
          <input type="radio" class="gender" name="gender" value="Male">Male<br>
          <input type="radio" class="gender" name="gender" value="Female">Female
        </div>
        <div class="search-fields check">
          <input type="checkbox" value="Single" name="check[]"> Single
          <input type="checkbox" value="Divorced" name="check[]"> Divorced
          <input type="checkbox" value="Married" name="check[]"> Married
        </div>
        <div class="search-fields">
          <input type="submit" class="submit" name="submit" value="Submit">
          </form>
          <?php
          if(isset($_POST['submit'])){
           $name = $_POST['name'];
           $country = $_POST['country'];
           $gender = $_POST['gender'];
           $ch = $_POST['check'];
           $check = implode(',',$ch);
           $search_sql = "select * from websignup inner join info on websignup.id=info.info_fk where country='{$country}' and relationship='{$check}'";
           $search_query = mysqli_query($con,$search_sql);
           $fetch = mysqli_fetch_assoc($search_query);
           echo $fetch['first_name'];

          }
          
          ?>
        </div>
    </div>
                                              <!-- right side advertisement -->


    <div class="right-side">Right Advertisement </div>
  
 </div>

                                <!-- After Search div -->
                                <!-- search result code -->


    <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/6.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>

                                      <!-- second result -->

                                      <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/1.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>

                                        <!-- advertisement -->

    <div class="search-ad-advertisement">
            Advertisement
    </div>

     

                                          <!-- second result -->

                                          <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/2.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>
                                          <!-- third result -->

                                          <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/3.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>
                                          <!-- fourth result -->

                                          <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/4.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>
                                          <!-- fifth result -->

                                          <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/5.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>


                                          <!-- sixth result -->

                                          <div class="result-div">
      <div class="image-data-container">
          <div class="picture-division">
            <img src="pictures/6.jpg" class="image" style="width:100%; height:100%; object-fit:cover;" alt=""> 
          </div>
          <div class="infomation-div">
                  <div class="search-text-information">
                        <div class="search-text">Age</div>
                        <div class="search-text">Country</div>
                        <div class="search-text">Gender</div>
                        <div class="search-text">Looking For</div>
                  </div>
                  <div class="search-data-information">
                        <div class="search-data">24</div>
                        <div class="search-data">China</div>
                        <div class="search-data">Female</div>
                        <div class="search-data">Men</div>
                  </div>
          </div>
      </div>
            <div class="about-me">About Me<br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita deleniti ab, accusamus modi ad, numquam totam aperiam repellendus incidunt recusandae quo obcaecati distinctio..... continue reading
            </div>
    </div>
    <?php include('..\footer/footer.php') ?>
</body>
</html>