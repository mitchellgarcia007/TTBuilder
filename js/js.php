<?php
    if(!$_GET["id"]){
        die("MIssing id");
    }

    include $_SERVER['DOCUMENT_ROOT']."/connection.php";
    
    $id = $_GET["id"];

    $sql = " SELECT * FROM TTinfo WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $active = trim($row["active"]);
        $TTname = trim($row["TTname"]);
        $TTlaunchPage = trim($row["TTlaunchPage"]);
        $TTlinkDestination = trim($row["TTlinkDestination"]);
        $image = trim($row["image"]);
    }

    if($active != 1){
        die("TT not active");
    }

    
    $usi_page_URL = $_SERVER['HTTP_REFERER'];

    if($usi_page_URL != $TTlaunchPage){
        die("Not launch page");
    }
?>

$(document).ready(function(){

    //hidden top div
    var div = document.createElement("div");
    div.className = "usi_top_div";
    div.style.width = "100%";
    div.style.height = "5px";
    div.style.background = "transparent";
    div.style.position = "fixed";
    div.style.top = "0";
    document.body.appendChild(div);

    //red cookies
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function main(){
        //Modal
        $(".usi_top_div").mouseenter(function(){
            if(getCookie("usi_cookie_launched") != 1){

                $("body").append('<div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">ID:<?php echo $id;?></h4></div><div class="modal-body"><img src="http://ttbuilder.mitchellgarcia.net/img/<?php echo $image;?>" style="display:block;margin:auto;max-width:400px;height:100%"></div><div class="modal-footer"><a href="<?php echo $TTlinkDestination;?>" class="btn btn-success" role="button">Go to Promotion</a></div></div></div></div>');

                $("#myModal").modal({show: "true"}); 
                //document.cookie = "usi_cookie_launched=1";

                console.log("lunching modal");
            }
            else{
                console.log("suppressing modal");
            }
        });
    }

    setTimeout(main, 1000);
        
});