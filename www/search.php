<?php
session_start();
if(isset($_SESSION['voornaam']) && isset($_SESSION['achternaam'] )){
    echo $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
}


$time = time();
echo date('d-m-Y H:i:s', $time);

if(isset($_GET['search_submit'] )){
    if(!empty($_GET['search'])){
        require 'database.php';
        $zoekterm = $_GET['search'];
        $sql = "SELECT * FROM tools WHERE name LIKE :zoekterm";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            "zoekterm" => "%$zoekterm%"
        ]);
        $tools = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


$sql = "SELECT COUNT(*) AS aantal FROM tools";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
$aantal = $resultaat['aantal'];
echo $aantal;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gevonden tools</title>
</head>

<body>
    <div class="container">
        <form action="" method="get">
            <input type="text" name="search" id="search" placeholder="Zoek naar gereedschap">
            <button type="submit" name="search_submit">Zoek</button>
        </form>
    </div>
    <div class="container">
        <h1>Resultaten</h1>
        <?php foreach ($tools as $tool) : ?>
        <?php endforeach; ?>
    </div>
</body>

</html>