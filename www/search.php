<?php
session_start();
require 'database.php';

$tools = [];

if (isset($_GET['search_submit'])) {
    if (!empty($_GET['search'])) {
        $zoekterm = $_GET['search'];
        $sql = "SELECT * FROM tools WHERE tool_name LIKE '%$zoekterm%'";
        $result = mysqli_query($conn, $sql);
        $tools = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
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