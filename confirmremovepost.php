<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
      
    $owner_name = $user_data['user_name'];

    if(!empty($owner_name))
    {
        $img_id = $_POST['follow_or_remove'];

        $query = "delete from images where owner_name = '$owner_name' and id = '$img_id'";
    
        mysqli_query($con, $query);
    }
    
    header("Location: index.php");
    die;

?>