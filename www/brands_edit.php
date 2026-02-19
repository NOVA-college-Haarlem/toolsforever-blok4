<?php
// Path: www/dashboard.php
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

require 'header.php';
require 'database.php';

$sql = "SELECT * FROM brands WHERE brand_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(
    [
        "id" => $_GET['id']
    ]
);
$brand = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<main>
    <div class="container">
        <h1>Brands</h1>
    </div>
    <h1>Update Brand</h1>
    <form action="brand_update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $brand['brand_id'] ?>">
        <div>
            <label for="">Brand Name</label>
            <input type="text" name="brand_name" value="<?php echo htmlspecialchars($brand['brand_name'])?>">
        </div>
        <button type="submit">Update brand</button>
    </form>

    <?php include 'footer.php' ?>