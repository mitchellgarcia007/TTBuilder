<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Connection to DB
    include $_SERVER['DOCUMENT_ROOT']."/connection.php";

    $usi_lc_id = mysqli_real_escape_string($conn, $_POST["usi_lc_id"]);
    $usi_lc_email = mysqli_real_escape_string($conn, $_POST["usi_lc_email"]);

    date_default_timezone_set("America/Los_Angeles");
    $dateCreated = date("Y-m-d H:i:s"); //LA time

    $sql = " INSERT INTO emailsData (usi_lc_id, usi_lc_email, dateCreated) 
    VALUES ($usi_lc_id, '$usi_lc_email', '$dateCreated') ";
    $result = mysqli_query( $conn, $sql );
    if($result){
        echo "Added";
    }
    else{
        echo "Error Found";
    }
}
else{
    echo "Error receiving";
}
?>