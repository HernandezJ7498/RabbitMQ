<!DOCTYPE html>
<?php
//if(isset($_SESSION['username'])){
//}
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
function logout(){
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
if(isset($_GET['hello'])){
    logout();
    header("location:index.php");
}
//echo $_GET['username'];
?>
<h1>ABOUT US</h1>
<a href="Homepage.php?hello=true">
    Logout
</a>
<a href="Homepage.php">
    Homepage
</a>
