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
  <title>USI Solutions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="overflow-x:hidden;margin-bottom:400px">

<nav class="navbar navbar-inverse" style="border-radius:0px;height:60px"> 
  <div class="container-fluid">
    <div class="navbar-header" style="width:100%">
        <a class="navbar-brand" href="/"> <img src="https://www2.upsellit.com/admin/control/edit/img/nav-logo-green.png" style="display: inline;margin-right: 5px;"> USI Solutions </a>
        <a class="navbar-brand hidden" href="createLCform.php" style="float:right;color:white"> Create LC </a>
        <a class="navbar-brand hidden" href="createTTform.php" style="float:right;color:white"> Create TT </a>
        <a class="navbar-brand hidden" href="/" style="float:right;color:white"> Home </a>
    </div>
  </div>
</nav>

<div class="container">
  <h3 class="text-center"> Our Solutions</h3>

    <table class="table table-hover table-responsive" style="margin-top:50px" id="myTable">
        <thead class="hidden">
        <tr>
            <th class="text-center">Image</th>
            <th>TT Info.</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td class='text-right hidden-xs' style='vertical-align: middle;'> <img src='img/LC3.png' style='max-width:500px;margin-bottom:10px'> <br> </td>
                <td style='vertical-align: middle;'>
                    <p class='visible-xs text-center'><img src='img/7005.jpg' style='max-width:200px;display:block;margin:10px auto'> <br>  <br><br></p>
                    <h2> Lead Capture </h2>
                    <p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px' target="_blank"> Desktop </a> </p>
                    <p><strong>View:</strong> <button onclick='clickFunction()' class='btn btn-primary' role='button' style='margin-left:10px'> Mobile </button> </p>
                </td>
            </tr>

            <tr>
                <td class='text-right hidden-xs' style='vertical-align: middle;'> <img src='img/TT2.png' style='max-width:500px;margin-bottom:10px'> <br> </td>
                <td style='vertical-align: middle;'>
                    <h2> Targeted Tactic </h2>
                    <p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px' target="_blank"> Desktop </a> </p>
                    <p><strong>View:</strong> <button onclick='clickFunction()' class='btn btn-primary' role='button' style='margin-left:10px'> Mobile </button> </p>
                </td>
            </tr>

            <tr>
                <td class='text-right hidden-xs' style='vertical-align: middle;'> <img src='img/Slider.png' style='max-width:500px;margin-bottom:10px'> <br> </td>
                <td style='vertical-align: middle;'>
                    <h2> LC Side Slider </h2>
                    <p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px' target="_blank"> Desktop </a> </p>
                    <p><strong>View:</strong> <button onclick='clickFunction()' class='btn btn-primary' role='button' style='margin-left:10px'> Mobile </button> </p>
                </td>
            </tr>

            <tr>
                <td class='text-right hidden-xs' style='vertical-align: middle;'> <img src='img/sidepanel.png' style='max-width:500px;margin-bottom:10px'> <br> </td>
                <td style='vertical-align: middle;'>
                    <h2> Side Panel </h2>
                    <p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px' target="_blank"> Desktop </a> </p>
                    <p><strong>View:</strong> <button onclick='clickFunction()' class='btn btn-primary' role='button' style='margin-left:10px'> Mobile </button> </p>
                </td>
            </tr>

            <tr>
                <td class='text-right hidden-xs' style='vertical-align: middle;'> <img src='img/chat.png' style='max-width:500px;margin-bottom:10px'> <br> </td>
                <td style='vertical-align: middle;'>
                    <h2> Chat </h2>
                    <p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px' target="_blank"> Desktop </a> </p>
                </td>
            </tr>

        <?php
        /*
            $sql = " SELECT * FROM TTinfo ORDER BY dateCreated DESC ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = trim($row["id"]);
                $active = trim($row["active"]);
                if($active == 1){
                    $active = "Yes";
                }
                else{
                    $active = "No";
                }
                $dateCreated = date_create($row["dateCreated"]);
                $dateCreated_formatted = date_format($dateCreated, 'm/d/Y h:i:sa');
                $TTname = trim($row["TTname"]);
                $TTlaunchPage = trim($row["TTlaunchPage"]);
                $TTlinkDestination = trim($row["TTlinkDestination"]);
                $image = trim($row["image"]);
                $JStag = "&lt;script src=&quot;http://ttbuilder.mitchellgarcia.net/js/js.php?id=$id&quot;&gt;&lt;/script&gt;";
                $solution = trim($row["solution"]);
                if($solution == "LC"){
                    $solution = "Lead Capture";
                }
                if($solution == "TT"){
                    $solution = "Targeted Tactic";
                }

            
                echo "<tr>";
                    echo "<td class='text-center hidden-xs' style='vertical-align: middle;'> <img src='img/$image' style='max-width:200px;margin-bottom:10px'> <br> <a href='#' class='btn btn-success hidden' role='button'> Edit </a> <a href='test.php?id=$id' class='btn btn-primary hidden' role='button' style='margin-left:10px'> View </a> </td>";
                    echo "<td style='vertical-align: middle;'>";
                        echo "<p class='visible-xs text-center'><img src='img/$image' style='max-width:200px;display:block;margin:10px auto'> <br> <a href='#' class='btn btn-success' role='button'> Edit </a> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px'> Test </a> <br><br></p>";
                        //echo "<p><strong>Solution Name:</strong> $TTname </p>";
                        echo "<p><strong>Solution Type:</strong> $solution </p>";
                        echo "<p><strong>View:</strong> <a href='test.php?id=$id' class='btn btn-primary' role='button' style='margin-left:10px'> Desktop </a> </p>";
                        echo "<p><strong>View:</strong> <button onclick='clickFunction($id)' class='btn btn-primary' role='button' style='margin-left:10px'> Mobile </button> </p>";
                        //echo "<p><strong>ID:</strong> $id </p>";
                        //echo "<p><strong>Active:</strong> $active </p>";
                        //echo "<p><strong>Date Created:</strong> $dateCreated_formatted </p>";
                        //echo "<p><strong>Launching Page:</strong> <a href='$TTlaunchPage' target='_blank'>$TTlaunchPage</a> </p>";
                        //echo "<p><strong>Destination Page:</strong> <a href='$TTlinkDestination' target='_blank'>$TTlinkDestination</a>  </p>";
                        if($solution == "LC"){
                            //echo "<p><strong>Emails Collected:</strong> <a href='emailsData.php?lc_id=$id'> View List </a> </p>";
                        }
                        //echo "<p><strong>JS Tag:</strong></p>";
                        echo "
                        <div class='input-group' style='max-width:550px'>
                            <input type='text' class='form-control' value='$JStag' id='myInput$id' readonly>
                            <div class='input-group-btn'>
                            <button class='btn btn-default' onclick='myFunction($id)'>
                                <i class='glyphicon glyphicon-copy'></i>
                            </button>
                            </div>
                        </div>
                        ";
                        
                    echo "</td>";
                echo "</tr>";
                
            }
            if(!$id){
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td> <h1 class='text-center'> Click <a src='createTTform.php'>here</a> to create a TT. </h1> </td>";
                echo "</tr>";
            }
            */
        ?>
        
        </tbody>
    </table>

</div>

<script>
function clickFunction(id) {
    window.open("test.php?id="+id+"", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=0,right=500,width=375,height=812");
}


function myFunction(id) {
    var copyText = document.getElementById("myInput"+id);
    copyText.select();
    document.execCommand("copy");
    //alert("Copied the text: " + copyText.value);
    alert("The link was copied to your clipboard!");
} 
</script>

</body>
</html>
