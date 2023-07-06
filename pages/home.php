<?php 
session_start();

    #$_SESSION;
    include("../connection.php");
    include("../functions.php");
    
    $user_data = check_login($con);

    if(!is_authorized($con)) //need to take out '!'
    {
        header("Location: index.php");
    } 
?>

<div class="homeContainer" id="homeContainer">
    <div class="profileContainer" id="profileContainer">
        <div>
            <img src="images/defaultavatar.png" alt="bruh">
        </div>
        <div class="profileOtherContainer">
            <div class="accNameContainer" id="accNameContainer">
                <p><?php echo $user_data['user_name']; ?></p>
            </div>
            <div class="statsContainer" id="statsContainer">
                <div>
                    <p>107</p>
                    <p>Posts</p>
                </div>
                <div>
                    <p>49</p>
                    <p>Followers</p>
                </div>
                <div>
                    <p>223</p>
                    <p>Following</p>
                </div>
            </div>
            <div class="newPostContainer greenBtn" id="newPostContainer" onclick="onLoadRedirect('newpost', true)">
               
                <p>New post</p>
                 
            </div>
        </div>
    </div>
    <div class="myPostsContainer" id="myPostsContainer">

    </div>
</div>