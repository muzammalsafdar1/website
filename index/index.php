<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@600&display=swap" rel="stylesheet">

                                      <!-- bootstrap 4 link -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
                                <!-- customized external css link -->
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="..\header/css/header.css">
<link rel="stylesheet" href="content/css/content.css">
<link rel="stylesheet" href="..\footer/footercss/footercss.css">

<title>Title</title>
</head>
<body>
<?php
include('..\header/header.php');
?>
<div class="gallery">
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
  <li data-target="#demo" data-slide-to="3"></li>
  <li data-target="#demo" data-slide-to="4"></li>

  <li data-target="#demo" data-slide-to="6"></li>
  <li data-target="#demo" data-slide-to="7"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner" >
  <div class="carousel-item active">
    <img class="one" src="images/1.jpg" style="width:100%; object-fit:cover;" alt="Los Angeles">
  </div>
  <div class="carousel-item">
    <img class="two" src="images/2.jpg" style="width:100%; object-fit:cover;" alt="Chicago">
  </div>
  <div class="carousel-item">
    <img class="three" src="images/3.jpg" style="width:100%; object-fit:cover;" alt="New York">
  </div>
  <div class="carousel-item">
    <img class="four" src="images/4.jpg" style="width:100%; object-fit:cover;" alt="New York">
  </div>
  <div class="carousel-item">
    <img class="five" src="images/5.jpg" style="width:100%; object-fit:cover;" alt="New York">
  </div>

  <div class="carousel-item">
    <img class="four" src="images/7.jpg" style="width:100%; object-fit:cover;" alt="New York">
  </div>
  <div class="carousel-item">
    <img class="five" src="images/8.jpg" style="width:100%; object-fit:cover;" alt="New York">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>
</div>
<?php
include('content/content.php');
?>

<br>

<?php
include('..\footer/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>