<?php
    session_start();
    if($_SESSION["login"] != "yes"){
        header('Location: /login.php');
    }
    
    include $_SERVER['DOCUMENT_ROOT']."/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Solutions Builder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="overflow-x:hidden;margin-bottom:400px">

<nav class="navbar navbar-inverse" style="border-radius:0px"> 
  <div class="container-fluid">
    <div class="navbar-header" style="width:100%">
        <a class="navbar-brand" href="/"> <img src="https://www2.upsellit.com/admin/control/edit/img/nav-logo-green.png" style="display: inline;margin-right: 5px;"> Solutions Builder</a>
        <a class="navbar-brand" href="createLCform.php" style="float:right;color:white"> Create LC </a>
        <a class="navbar-brand" href="createTTform.php" style="float:right;color:white"> Create TT </a>
        <a class="navbar-brand" href="/" style="float:right;color:white"> Home </a>
    </div>
  </div>
</nav>

<div class="container">
  <h3 class="text-center"> Create Your LC </h3>
    <div id="divForm">
        <form id="createTT" action="createTT.php" method="POST" enctype="multipart/form-data">
        <input type="text" class="hidden" id="solution" name="solution" value="LC" required>
            <div class="form-group">
                <label for=""> LC Name: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Ex. 10% Off on All Shoes"></span> </label>
                <input type="text" class="form-control" id="TTname" name="TTname" placeholder="Ex. 10% Off on All Shoes" required>
            </div>
            <br>
            <div class="form-group">
                <label for=""> Launch LC on these Pages: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Ex. https://www.example.com/cart.html"></span> </label>
                <br><br>
                <label>Page 1 (Required)</label>
                <input type="text" class="form-control" id="TTlaunchPage" name="TTlaunchPage" placeholder="Ex. https://www.example.com/index.html" required>
                <label>Page 2 (Optional)</label>
                <input type="text" class="form-control" id="TTlaunchPage2" name="TTlaunchPage2" placeholder="Ex. https://www.example.com/cart.html">
                <label>Page 3 (Optional)</label>
                <input type="text" class="form-control" id="TTlaunchPage3" name="TTlaunchPage3" placeholder="Ex. https://www.example.com/checkout.html">
            </div>
            <br>
            <div class="form-group">
                <label for=""> LC Link Destination: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="This is the page where you want to redirect users after clicking the CTA. Ex. https://www.example.com/checkout.html"></span> </label>
                <input type="text" class="form-control" id="TTlinkDestination" name="TTlinkDestination" placeholder="Ex. https://www.example.com/promotions.html" required>
            </div>
            <div class="form-group">
                <label for=""> LC Background: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Image that you want to display on the Targeted Tactic window."></span> </label>
                <input type="file" class="form-control" name="eventImage" required>
            </div>
            <button type="submit" class="btn btn-success" style="margin:auto;display:block"> Create LC </button>
        </form>
    </div>
</div>

<style>
#divForm{
    margin: 50px auto;
    max-width: 700px;
    height: auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 3px;
    padding: 60px 30px 60px 30px;
}
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 

    $("form").submit(function(e){
        $( "#createTT" ).submit();
    });

});
</script>

</body>
</html>
