<?php
$host='localhost';
$user='root';
$pass='';
$db='navneet_pratical';
$con=mysqli_connect($host,$user,$pass,$db);
if($con){
    echo '';
}
else{
    echo 'DB NOT CONNECTED';
}
?>