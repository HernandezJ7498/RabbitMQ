<!DOCTYPE html>
<?php
session_start();
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
?>
<h1>WELCOME</h1>
<a href="Homepage.php?hello=true">
    Logout
</a>