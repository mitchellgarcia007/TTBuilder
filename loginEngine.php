<?php
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

if($username === "hello" && $password === "there"){
    session_start();
    $_SESSION["login"] = "yes";
    header('Location: /index.php');
}
else{
    header('Location: /login.php?error=true');
}
?>