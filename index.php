<?php
    include $_SERVER['DOCUMENT_ROOT']."/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TT Builder</title>
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
        <a class="navbar-brand" href="/">TT Builder</a>
        <a class="navbar-brand" href="createTTform.php" style="float:right;color:white"> Create TT </a>
    </div>
  </div>
</nav>

<div class="container">
  <h3 class="text-center"> All TTs</h3>

    <table class="table table-hover table-responsive" style="margin-top:50px" id="myTable">
        <thead class="hidden">
        <tr>
            <th class="text-center">Image</th>
            <th>TT Info.</th>
        </tr>
        </thead>
        <tbody>

        <?php
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

            
                echo "<tr>";
                    echo "<td class='text-center hidden-xs' style='vertical-align: middle;'><img src='img/$image' style='max-width:200px'></td>";
                    echo "<td style='vertical-align: middle;'>";
                        echo "<p class='visible-xs'><img src='img/$image' style='max-width:200px;display:block;margin:20px auto'></p>";
                        echo "<p><strong>TT Name:</strong> $TTname </p>";
                        echo "<p><strong>ID:</strong> $id </p>";
                        echo "<p><strong>Active:</strong> $active </p>";
                        echo "<p><strong>Date Created:</strong> $dateCreated_formatted </p>";
                        echo "<p><strong>Launching Page:</strong> <a href='$TTlaunchPage' target='_blank'>$TTlaunchPage</a> </p>";
                        echo "<p><strong>Destination Page:</strong> <a href='$TTlinkDestination' target='_blank'>$TTlinkDestination</a>  </p>";
                        echo "<p><strong>JS Tag:</strong> <figure><pre><code>&lt;script src='http://ttbuilder.mitchellgarcia.net/js/js.php?id=$id'&gt;&lt;/script&gt;</code></pre></figure> </p>";
                        echo "<a href='#' class='btn btn-success' role='button'> Edit TT </a>";
                    echo "</td>";
                echo "</tr>";
                
            }
            if(!$id){
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td> <h1 class='text-center'> Click <a src='createTTform.php'>here</a> to create a TT. </h1> </td>";
                echo "</tr>";
            }
        ?>
        
        </tbody>
    </table>

</div>

</body>
</html>
