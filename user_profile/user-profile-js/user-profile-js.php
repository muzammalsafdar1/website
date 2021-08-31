<script>

                // cover picture change pop-up


$(document).ready(function(){
    $(".edit-cover-picture").click(function(){
      $(".full-screen").css("display","block");
      $(".upload-picture-div").css("display","block");
    });
    $(".full-screen").click(function(){
      $(".upload-picture-div").css("display", "none");
      $(".full-screen").css("display","none");
    });
});


                          // profile picture change pop-up


  $(document).ready(function(){
    $(".profile-picture-change-icon").click(function(){
      $(".full-screen-for-profile").css("display", "block");
      $(".upload-picture-div-profile").css("display","block");
    });
    $(".full-screen-for-profile").click(function(){
      $(".upload-picture-div-profile").css("display","none");
      $(".full-screen-for-profile").css("display", "none");
    });
  });



                    // username info and status pop-up


  $(document).ready(function(){
    $(".edit-status-name").click(function(){
        $(".full-sceen-name-status").css("display","block");
        $(".edit-name-status-info").css("display", "block");
    });
    $(".full-sceen-name-status").click(function(){
      $(".edit-name-status-info").css("display", "none");
      $(".full-sceen-name-status").css("display","none");
    });
  });


                // about me edit pop-up


$(document).ready(function(){
  $(".about-me-popup-btn").click(function(){
      $(".full-screen-for-aboutme").css("display","block");
      $(".about-me-div").css("display", "block");
     
  });
  $(".full-screen-for-aboutme").click(function(){
    $(".about-me-div").css("display", "none");
    $(".full-screen-for-aboutme").css("display","none");

  });
});


$(document).ready(function(){
  $("option").css("color","black");
  $("select").css("color","black");
  $(".aboutme-div").css({"overflow":"auto", "margin-top":"-30px"});
});

                        // user interest edit pop up

$(document).ready(function(){
  $(".user-interest-pop-up").click(function(){
      $(".full-screen-user-interest").css("display","block");
      $(".user-interest-popup-div").css("display", "block");
  });
  $(".full-screen-user-interest").click(function(){
    $(".user-interest-popup-div").css("display", "none");
    $(".full-screen-user-interest").css("display","none");
  });
});



$(document).ready(function(){
  $(<?php echo $post_result['user_id'] ?>).click(function(){
    $(".full-screen-popup-post").css({
      "display":"block",
      "width":"100%",
      "max-width": "13500px",
      "min-width": "320px",
      "height": "100%",
      "background-color": "rgba(199, 195, 195,0.5)",
      "position": "fixed",
      "top":"0",
      "left": "0"
    });
    $("#p1").css({
      "width":"100%",
      "hight":"100%",
      "position":"fixed",
      "top":"0",
      "left":"270px",
      "z-index":"5",
      "overflow-y":"scroll"
  })  
    $("#c1").css("display","block");
  });
  $(".full-screen-popup-post").click(function(){
    $(".full-screen-popup-post").css("display","none");
    $("#p1").css({
      "position":"relative",
      "top":"0",
      "left":"0",
      "overflow":"hidden"
    
    });
    $("#c1").css("display","none");
    
  })
});

</script>