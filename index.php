<?php
    include $_SERVER['DOCUMENT_ROOT']."/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Targeted Tactic Builder</title>
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
        <a class="navbar-brand" href="/">Targeted Tactic Builder</a>
    </div>
  </div>
</nav>

<div class="container">
  <h3 class="text-center"> Create Your Targeted Tactic </h3>
    <div id="divForm">
        <form id="createTT" action="createTT.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Targeted Tactic Name: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Ex. 10% Off on Shoes"></span> </label>
                <input type="text" class="form-control" id="TTname" name="TTname" required>
            </div>
            <div class="form-group">
                <label for="">Launch Targeted Tactic on This Page: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Ex. www.example.com/cart.html"></span> </label>
                <input type="text" class="form-control" id="TTlaunchPage" name="TTlaunchPage" required>
            </div>
            <div class="form-group">
                <label for="">Link Destination: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="This is the page where you want to redirect users after clicking the CTA. Ex. www.example.com/checkout.html"></span> </label>
                <input type="text" class="form-control" id="TTlinkDestination" name="TTlinkDestination" required>
            </div>
            <div class="form-group">
                <label for="">Targeted Tactic Background Image: <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Image that you want to display on the Targeted Tactic window."></span> </label>
                <input type="file" name="eventImage">
            </div>
            <button type="submit" class="btn btn-success" style="margin:auto;display:block"> Create TT </button>
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
