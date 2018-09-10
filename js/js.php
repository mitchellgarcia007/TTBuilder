<?php

    // Make sure ID exists
    if(!$_GET["id"]){
        die("Missing ID");
    }

    // Get Clients URL info
    $usi_page_URL = $_SERVER['HTTP_REFERER'];

    // Get Clients Host info
    $referer = parse_url($_SERVER['HTTP_REFERER']);
    $referer = $referer['host'];

    // Connection to DB
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
        $solution = trim($row["solution"]);
    }

    // Verify that TT is active
    if($active != 1){
        die("TT not active");
    }

    // This is for Test.php
    if($referer == "ttbuilder.mitchellgarcia.net"){
        $TTlinkDestination = "http://ttbuilder.mitchellgarcia.net/test.php?id=".$id;
    }
    else{
        // Make sure we will launch the TT on the correct pages
        if($usi_page_URL != $TTlaunchPage){
            die("Not launch page");
        }
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

        var modal = [
            '<div id="myModal" class="modal fade" role="dialog">',
                '<div class="modal-dialog">',
                
                '<div class="modal-content">',
                    '<div class="modal-header" style="border-bottom:unset">',
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>',
                    '</div>',
                    '<div class="modal-body">',
                        '<img src="http://ttbuilder.mitchellgarcia.net/img/<?php echo $image;?>" style="display:block;margin:auto;max-width:100%;height:auto">',
                    '</div>',

                    
                    // TT footer
                    '<div class="modal-footer TTfooter <?php if($solution != "TT"){echo "hidden";}?>" style="border-top:unset">',
                        '<a href="<?php echo $TTlinkDestination;?>" class="btn btn-success btn-block btn-lg" role="button">Go to Promotion</a>',
                    '</div>',


                    // LC footer
                    '<div class="modal-footer LCfooter <?php if($solution != "LC"){echo "hidden";}?>" style="border-top:unset;text-align:center;font-size:9px">',
                            '<div class="input-group" style="max-width:400px;margin:auto">',
                                '<input type="text" class="form-control usi_lc_email" placeholder="Enter Your Email" required>',
                                '<div class="input-group-btn">',
                                    '<button class="btn btn-success usi_lc_btn"> Submit <i class="glyphicon glyphicon-send"></i></button>',
                                '</div>',
                            '</div>',
                            'By providing your email address you are consenting to the terms of this privacy policy.',
                    '</div>',     

                      
                '</div>',

                '</div>',
            '</div>',
        ].join('');

        // Mobile Modal
        $("#mobileBackBtn").click(function(){
            if(getCookie("usi_cookie_launched") != 1){

                $("body").append(modal);

                $("#myModal").modal({show: "true"}); 
                //document.cookie = "usi_cookie_launched=1";

                // AJAX LC emails data
                $(".usi_lc_btn").click(function(){
                    var usi_lc_email = $(".usi_lc_email").val();
                    if(usi_lc_email == "" || usi_lc_email == null){
                        alert("Please enter your email address.");
                        return false;
                    }
                    $.ajax({ 
                        url: "/js/emailsData.php",
                        type: 'POST',
                        data: { usi_lc_id: <?php echo $id; ?>,
                            usi_lc_email: usi_lc_email
                        },
                        success: function(data){
                            if(data == "Added"){
                                console.log("Added");
                                $(".usi_lc_email").val("");
                                $('#myModal').modal('hide');
                            }
                            else{
                                console.log(data);
                                $(".usi_lc_email").val("");
                                $('#myModal').modal('hide');
                            }
                        }
                    });
                });

                console.log("lunching modal");
            }
            else{
                console.log("suppressing modal");
            }
        });


        // Desktop Modal
        $(".usi_top_div").mouseenter(function(){
            if(getCookie("usi_cookie_launched") != 1){

                //new modal
                /* https://www.w3schools.com/howto/howto_css_modals.asp
                var usi_modal_div = document.createElement("div");
                usi_modal_div.className = "block";
                usi_modal_div.style.position = "fixed";
                usi_modal_div.style.z-index = "1";
                usi_modal_div.style.padding-top = "100px";
                usi_modal_div.style.left = "0";
                usi_modal_div.style.top = "0";
                usi_modal_div.style.width = "100%";
                usi_modal_div.style.height = "100%";
                usi_modal_div.style.overflow = "auto";
                usi_modal_div.style.background-color = "rgb(0,0,0)";
                usi_modal_div.style.background-color = "rgba(0,0,0,0.4)";            
                document.body.appendChild(usi_modal_div);
                */

                $("body").append(modal);

                $("#myModal").modal({show: "true"}); 
                //document.cookie = "usi_cookie_launched=1";

                // AJAX LC emails data
                $(".usi_lc_btn").click(function(){
                    var usi_lc_email = $(".usi_lc_email").val();
                    if(usi_lc_email == "" || usi_lc_email == null){
                        alert("Please enter your email address.");
                        return false;
                    }
                    $.ajax({ 
                        url: "/js/emailsData.php",
                        type: 'POST',
                        data: { usi_lc_id: <?php echo $id; ?>,
                            usi_lc_email: usi_lc_email
                        },
                        success: function(data){
                            if(data == "Added"){
                                console.log("Added");
                                $(".usi_lc_email").val("");
                                $('#myModal').modal('hide');
                            }
                            else{
                                console.log(data);
                                $(".usi_lc_email").val("");
                                $('#myModal').modal('hide');
                            }
                        }
                    });
                });

                console.log("lunching modal");
            }
            else{
                console.log("suppressing modal");
            }
        });

        // Store emails


    }

    setTimeout(main, 1000);
        
});




