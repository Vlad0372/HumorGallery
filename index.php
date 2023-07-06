<?php 
session_start();

    #$_SESSION;
    include("connection.php");
    include("functions.php");

    // if($_SERVER['REQUEST_METHOD'] == "POST")
    // {
    //     echo "GOVNO";
    // }

    $is_access_allowed = false;
    $user_data = check_login($con);

    $rand_images_json = 1;
    $user_images_json = 1;

    if($user_data != null)
    {
        $is_access_allowed = true;
        $rand_images = get_rand_images($con, 40, $user_data['user_name']);
        $user_images = get_user_images($con);

        $rand_images_json = json_encode($rand_images);
        $rand_images_json = str_replace('"', "'", $rand_images_json);

        $user_images_json = json_encode($user_images);
        $user_images_json = str_replace('"', "'", $user_images_json);
    }
    //$user_images = get_images($con);
    

    //$cars = array("Volvo", "BMW", "Toyota");
    //echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";

    //echo json_encode($user_images);

    //echo $user_images[2]['text'];
    
    //$bruh = json_encode($user_images);
   
    
    // $img_arr_length = count($user_images);

    // for($i = 0; $i < $img_arr_length; $i++)
    // {
    //     echo $user_images[$i]['text'];       
    // }




    //$is_access_allowed = check_access($con);
    
    #--------------
    //$is_access_allowed = true;
    #--------------
    
    #<body onload="onLoad('main')">
    //echo "<script>callAllert();</script>"  
    // <?php 
    // echo "<script>BRUH();</script>"  
    

    //onLoadRedirect('main', '')

    //Encode the data as a JSON string
    // $jsonStr = json_encode($rand_images);
    // $jsonStr = str_replace('"', "'", $jsonStr);

    
    //echo $jsonStr;
?>


<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Galeria sztuki humoru.</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="myscripts.js?2"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body onload="openMainPage(<?php echo $rand_images_json; ?>, '<?php echo $is_access_allowed;?>')">
    <div class="main" id="main">
        <div class="header">
            <div class="headerLeft">             
                <img src="images/img4.png" alt="bruh">
            </div>

            <div class="headerMiddle">
                <a>
                    <div class="option1" onclick="openMainPage(<?php echo $rand_images_json; ?>, '<?php echo $is_access_allowed;?>')">
                        <p>Main</p>
                    </div>
                </a>
                <a>
                    <div class="option2" onclick="openHomePage(<?php echo $user_images_json; ?>, '<?php echo $is_access_allowed;?>')">
                        <p>Home</p>
                    </div>
                </a>                
            </div>

            <div class="headerRight">
                <a class="loginBtn" onclick="openLoginRegisterPage('login', '<?php echo $is_access_allowed;?>')">
                    <div>
                        <p id="loginbtn"></p>
                    </div>
                </a>               
            </div>
        </div>
        <div class="body" id="body">
            
        </div>
        <div class="footer">

        </div>

        
    </div>
</body>
</html>