<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

//check method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "You are not allowed to view this page";
    exit;
}

if( !isset($_POST['brand_name'])
   
    ){
    echo "een van de gevraagde keys ontbreekt";
    exit;
}

$name = $_POST['brand_name'];
$id = $_POST['id'];

if(empty($name)){
    echo "Naam mag niet leeg zijn";
    exit;
}

require 'database.php';
$sql = "UPDATE brands SET brand_name = :name WHERE brand_id = :id";
$stmt = $conn->prepare($sql);
$result = $stmt->execute(
    [
    "name" => $name,
    "id" => $id
    
  
]
);

if ($result) {
    header("Location: brands_index.php");
    exit;
}

echo "Something went wrong";
