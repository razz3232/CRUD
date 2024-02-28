<?php

$con = new mysqli('localhost','root','','crud operation');
if(!$con){
    die(mysqli_error($con));
}

?>