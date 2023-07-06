<?php 
session_start();

    #$_SESSION;
    include("../connection.php");
    include("../functions.php");

    #--------------
    //$is_access_allowed = "false";
    #--------------

    //redirect_if_unauthorized($con);
    
    if(!is_authorized($con)) //need to take out '!'
    {
        header("Location: index.php");
    }
    //$user_data = check_login($con);
    //$is_access_allowed = check_access($con);
    //echo "<script> onLoadRedirect('login', 'false'); </script>";
    // if($is_access_allowed == false)
    // {
    //     echo "<script> onLoadRedirect('login', 'false'); </script>";
    // }
    #<body onload="onLoad('index')">
   //echo "<script>addContainer('mainContainer', 8, 'images/defaultimage2.png');</script>";
    //addContainer('mainContainer', 18, "images/defaultimage2.png"); 
   
?>


<div class="mainContainer" id="mainContainer">

</div>
