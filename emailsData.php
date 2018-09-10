<?php
    session_start();
    if($_SESSION["login"] != "yes"){
        header('Location: /login.php');
    }
    
    include $_SERVER['DOCUMENT_ROOT']."/connection.php";
    
    $lc_id = $_GET["lc_id"];
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
  <h3 class="text-center"> Emails Data</h3>

  <a href="dump.php?lc_id=<?php echo $lc_id;?>" class="btn btn-info" role="button" target="_blank">Download Emails List</a>

    <table class="table table-hover table-responsive" style="margin-top:50px" id="myTable">
        <thead>
        <tr>
            <th style='width:40px'> # </th>
            <th style='width:40px'> Date/Time </th>
            <th> Emails </th>
        </tr>
        </thead>
        <tbody>

        <?php
            $counter = 1;
            $sql = " SELECT * FROM emailsData WHERE usi_lc_id = '$lc_id' ORDER BY dateCreated DESC ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $usi_lc_email = trim($row["usi_lc_email"]);
                $dateCreated = date_create($row["dateCreated"]);
                $dateCreated_formatted = date_format($dateCreated, 'm/d/Y h:i:sa');
            
                echo "<tr>";
                    echo "<td> $counter </td>";
                    echo "<td> $dateCreated_formatted </td>";
                    echo "<td> $usi_lc_email </td>";
                echo "</tr>";

                $counter ++;
                
            }
            if(!$usi_lc_email){
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td><h1 class='text-center'> No emails collected yet.</h1></td>";
                    echo "<td></td>";
                echo "</tr>";
            }
        ?>
        
        </tbody>
    </table>

</div>

</body>
</html>
