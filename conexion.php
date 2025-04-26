<?php
$servername="XLLS";
$usname="root";
$password="";
$db_name="insea1a";
$conn=mysqli_connect($servername,$usname,$password,$db_name);
if(!$conn){
    die("connection filed!".mysqli_connect_error());
}


?>