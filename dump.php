<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT']."/connection.php";
    
$lc_id = $_GET["lc_id"];

$list = [];

$sql = " SELECT * FROM emailsData WHERE usi_lc_id = '$lc_id' ORDER BY dateCreated DESC ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $list[] = trim($row["usi_lc_email"]);
}

$file = fopen("emailsCollected.csv","w");

foreach ($list as $line)
{
    fputcsv($file,explode(',',$line));
}

fclose($file); 

header('Location: /emailsCollected.csv');
?> 