<?php
$host="localhost";
$name="root";
$pass="";
$db="asd";

$con=mysqli_connect($host, $name, $pass, $db);

if($con){
    echo "conn";
}else{
    echo "not";
}
?>