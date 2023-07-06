<?php
function get_images($con)
{
    
    $query = "select * from images";
    $result = mysqli_query($con, $query);
    $result_array = null;

    while ($row = mysqli_fetch_assoc($result)) {
        $result_array[] = $row;
    }
    

        
    //$user_images = mysqli_fetch_assoc($result);
    return $result_array;
        
    die;
}
function get_rand_images($con, $imgCount, $user_name)
{ 
    $query = "select * from images where owner_name not like '$user_name' order by rand() limit $imgCount";
    $result = mysqli_query($con, $query);
    $result_array = null;

    while ($row = mysqli_fetch_assoc($result)) {
        $result_array[] = $row;
    }
    
    return $result_array;      
    die;
}

function get_user_images($con)
{ 
    $result_array = null;

    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];

        $query = "select * from images where owner_name = (select user_name from users where user_id = '$user_id');";
        $result = mysqli_query($con, $query);
        

        while ($row = mysqli_fetch_assoc($result)) 
        {
            $result_array[] = $row;
        }
    }
       
    return $result_array;      
    die;
}

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    //header("Location: login.php");
    return null;
    die;
}

function redirect_if_unauthorized($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {           
            return true;
        }
    }

    //redirect to index
    header("Location: index.php");
    die;
}

function is_authorized($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {           
            return true;
        }
    }

    //redirect to index
    return false;
    die;
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);

    for($i=0; $i < $len; $i++){
        # code..

        $text .= rand(0, 9);
    }

    return $text;
}


 ?>