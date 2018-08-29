<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT']."/connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $TTname = mysqli_real_escape_string($conn, $_POST["TTname"]);
    $TTlaunchPage = mysqli_real_escape_string($conn, $_POST["TTlaunchPage"]);
    $TTlinkDestination = mysqli_real_escape_string($conn, $_POST["TTlinkDestination"]);

    date_default_timezone_set("America/Los_Angeles");
    $dateCreated = date("Y-m-d H:i:s"); //LA time

    $sql2 = " INSERT INTO TTinfo (active, dateCreated, TTname, TTlaunchPage, TTlinkDestination) 
    VALUES (1, '$dateCreated', '$TTname', '$TTlaunchPage', '$TTlinkDestination') ";
    $result2 = mysqli_query( $conn, $sql2 );
    if($result2){

        // Get last event id
        $TTID = mysqli_insert_id($conn);

        // Only store image data if user uploaded an image     
        if($_FILES['eventImage']['size'] != 0){

            $eventImageName_Original = $_FILES['eventImage']['name'];
            $eventImageExtension = pathinfo($eventImageName_Original, PATHINFO_EXTENSION);
            $eventImageName = $TTID.".".$eventImageExtension;
            $eventImageType = $_FILES['eventImage']['type'];
            $eventImageSize = $_FILES['eventImage']['size'];
            // image file directory
            $target = "img/".basename($eventImageName);
            $sql3 = " UPDATE TTinfo SET image='$eventImageName' WHERE id='$TTID' ";
            $result3 = mysqli_query( $conn, $sql3 );
            if($result3){
                move_uploaded_file($_FILES['eventImage']['tmp_name'], $target);
            }
        }
        
        header('Location: /');
        die;
    }
    else{
        die("Please go back.");
    }

}

?>