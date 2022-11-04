<?php
$webserver = "localhost";
$user = "root";
$password = "";
$db_name = "management";

    $db_connection = new mysqli($webserver, $user, $password, $db_name);
    if(! $db_connection){
        echo "you are not connected!";
    }else {
        echo "page found!";
    }

        
?>