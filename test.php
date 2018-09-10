<?php
session_start();
if($_SESSION["login"] != "yes"){
    header('Location: /login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Test Your Solution </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
  <button type="button" class="btn btn-default" style="margin-top:20px;display:none" id="mobileBackBtn">Back (Mobile Only) </button>
  <div class="jumbotron" style="margin-top:5%">
    <h1>Test Your Solution</h1>      
    <p>1. Please try to abandon the site</p>
  </div>
</div>
<style>
@media only screen and (max-width: 500px) {
  #mobileBackBtn {
    display: block !important;
  }
}
</style>
<script src="http://ttbuilder.mitchellgarcia.net/js/js.php?id=<?php echo $_GET["id"]?>"></script>
</body>
</html>
