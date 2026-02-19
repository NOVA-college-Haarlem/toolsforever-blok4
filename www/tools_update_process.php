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

if( !isset($_POST['name']) || 
    !isset($_POST['category']) ||
    !isset($_POST['brand']) ||
    !isset($_POST['image'])
    
    ){
    echo "een van de gevraagde keys ontbreekt";
    exit;
}

require 'database.php';

$id = $_POST['tool_id'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$price = (int) $_POST['price'];
$image = $_POST['image'];

$sql = "UPDATE tools SET 
tool_name = :name,
tool_brand = :brand,
tool_category = :category,
tool_price = :price,
tool_image = :image
WHERE tool_id = :id
";

$stmt = $conn->prepare($sql);

$result = $stmt->execute(
    [
        'name' => $name,
        'brand' => $brand,
        'category' => $category,
        'price' => $price,
        'image' => $image,
        'id' => $id
    ]
);

if($result){
    header("location: tools_edit.php?id=$id");
    exit;
}