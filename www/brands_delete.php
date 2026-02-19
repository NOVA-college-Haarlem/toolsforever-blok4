<?php

if($_SERVER["REQUEST_METHOD"] != "GET"){
    echo "Huh? Wat doe je?";
    exit;
}


if(    isset($_GET['id'])     ){

    require 'database.php';

    $id = $_GET["id"];

    $sql = "DELETE FROM brands WHERE brand_id = :id";

    $stmst = $conn->prepare($sql);
    $stmst->execute(
        [
            "id" => $id
        ]
    );


    header("location: brands_index.php");
}