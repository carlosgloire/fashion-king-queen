<?php
function notconnected(){
    if (! isset($_SESSION['admin'])) {
        // Redirect to the login page if not logged in
        header("Location: login.php");
        exit();
    }
}
function logout(){
    if(isset($_POST['logout'])){
        session_destroy();
        header('location: login.php');
        exit();
    }
}