<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db= "news_website";
$conn = mysqli_connect($hostname,$username, $password, $db);
if(!$conn)
{
    die("connection is not stablished");
    
}
?>