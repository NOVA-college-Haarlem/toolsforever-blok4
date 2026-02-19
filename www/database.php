<?php

$dbhost = 'mariadb';
$dbname = 'tools4ever';
$dbuser = 'root';
$dbpass = 'password';
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
