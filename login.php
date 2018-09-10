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
<body style="background-color:rgb(51, 51, 51);">

<div class="alert alert-danger <?php if($_GET["error"] != "true"){echo "hidden";}?>">
  <p class="text-center"><strong>Wrong login information!</strong></p>
</div>

<div class="container">

    <img src="https://us.upsellit.com/wp-content/uploads/2018/08/UpSellit-silver-logo.svg" style="display:block;margin:auto;margin-top:100px;width:200px">
    <h2 class="text-center" style="color:#c6c3c3"> Solutions Builder </h2>
    
    <div id="loginDiv">
        <form d="createTT" action="loginEngine.php" method="POST">
            <div class="form-group">
                <label for="usr">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div> 
            <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
    </div>
    
</div>

<style>
#loginDiv{
    padding:20px 20px 20px 20px;
    border:1px solid white;
    margin: 60px auto;
    max-width:400px;
    height:auto;
    border-radius:4px;
    background-color:white;
}
</style>

</body>
</html> 