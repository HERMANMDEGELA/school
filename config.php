<?php
//db_connection.php
$conn=mysqli_connect('localhost','root', '', 'schoold');

//check if the connection was successfull
if (!$conn){
die('connection failed:' .mysqli_connect_error());
}
?>
