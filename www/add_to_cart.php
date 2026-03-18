<?php

session_start();
require 'database.php';

header('Content-Type: application/json');//vertelt de browser dat we JSON teruggeven

// Lees de JSON body
$input = file_get_contents('php://input');//leest de JSON body
$data = json_decode($input, true);//decode de JSON body



if (!isset($_SESSION['user_id']) || !isset($data['tool_id'])) {
    echo json_encode(['success' => FALSE]);// geven aan de browser dat het NIET gelukt is
    exit;
}

$user_id = $_SESSION['user_id'];
$tool_id = $data['tool_id'];

// Voeg toe aan winkelwagen (of verhoog aantal)
$sql = "INSERT INTO cart (user_id, tool_id, quantity) VALUES (:user_id, :tool_id, 1)
        ON DUPLICATE KEY UPDATE quantity = quantity + 1";   
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $user_id, 'tool_id' => $tool_id]);

$success = TRUE;
echo json_encode(['success' => $success]);//geven aan de browser dat het GELUKT is