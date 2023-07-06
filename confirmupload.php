<?php 
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if(isset($_POST['upload']))
    {
        $target = "images/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];

        if($target == "images/")
        {
            $target = "images/defaultimage.png";
            $image = "defaultimage.png";         
        }
        

        $text = $_POST['text'];
        //-----------------
        $text = str_replace("'", '"', $text);
        //-----------------
        $owner_name = $user_data['user_name'];

        $query = "insert into images (image, text, owner_name) values ('$image', '$text', '$owner_name')";

        mysqli_query($con, $query);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
            $msg = "Image uploaded successfully";
        }
        else
        {
            $msg = "There was a problem uploading image";
        }
    }   

    header("Location: index.php");
    die;
?>