<?php 
session_start();

    include("../connection.php");
    include("../functions.php");
      
    if(is_authorized($con))
    {
        header("Location: index.php");
    }       
?>

<div class="loginContainer" id="loginContainer">
    <form method="post" action="confirmregister.php">
        <div class="container">
            <h1>Register</h1>

            <input type="text" placeholder="Enter User name" name="user_name" id="acc-name" required>

            <input type="password" placeholder="Enter Password" name="password" id="psw" required>

            <button type="submit" class="registerbtn greenBtn">Register</button>
        </div>

        <div class="containerSignin">
            <p>Already have an account?</p>
            <p> <a href="#" onclick="openLoginRegisterPage('login', false)">Sign in</a>.</p>
        </div>
    </form>
</div>