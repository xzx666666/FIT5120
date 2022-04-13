<?php

$host = "localhost"; /* Host name */
$user = "kkobe697_imageuser"; /* User */
$password = "TA35imagegallery"; /* Password */
$dbname = "kkobe697_image"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}