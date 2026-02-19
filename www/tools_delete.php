<?php

if($_SERVER["REQUEST_METHOD"] != "GET"){
    echo "Huh? Wat doe je?";
    exit;
}


if(    isset($_GET['id'])     ){

    require 'database.php';

    $id = $_GET["id"];

    $sql = "DELETE FROM tools WHERE tool_id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        "id" => $id
    ]);

    header("location: tools_index.php");
}