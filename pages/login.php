<?php 
session_start();

    #$_SESSION;
    include("../connection.php");
    include("../functions.php");
    

    if(is_authorized($con)) //need to take out '!'
    {
        header("Location: index.php");
    }  
?>

<div class="loginContainer" id="loginContainer">
    <form method="post" action="confirmlogin.php">
        <div class="container">
            <h1>Login</h1>


            <input type="text" placeholder="Enter User name" name="user_name" id="email" required>

            <input type="password" placeholder="Enter Password" name="password" id="psw" required>

            <button type="submit" class="loginbtn greenBtn">Login</button>
        </div>

        <div class="containerSignin">
            <p>Not registered?</p>
            <p><a href="#" onclick="openLoginRegisterPage('register', false)">Create an account</a>.</p>
        </div>
    </form>
</div>
            