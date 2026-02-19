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

$tool_id = $_GET['id'];

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM brands");
$stmt->execute();
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM tools WHERE tool_id = :tool_id";
$stmt = $conn->prepare($sql);
$stmt->execute(
    [
        "tool_id" => $tool_id
    ]
);
$tool = $stmt->fetch(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <h1>Update Gereedschap</h1>
    <div class="container">
        <form action="tools_update_process.php" method="post">
            <input type="hidden" name="tool_id" value="<?php echo $tool['tool_id'] ?>">
            <div>
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($tool['tool_name'])?>">
            </div>
            <div>
                <label for="category">Categorie:</label>
                <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($tool['tool_category'])?>">
            </div>
            <div>
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($tool['tool_price'])?>">
            </div>
           <div>
                <label for="brand">Merk:</label>
                <select name="brand" id="brand">
                    <option value="selecteer merk">Selecteer merk</option>
                    <?php foreach($brands as $brand):?>
                        <option value="<?php echo htmlspecialchars($brand['brand_id'])?>">
                            <?php echo htmlspecialchars($brand['brand_name'])?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div>
                <label for="image">Afbeelding:</label>
                <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($tool['tool_image'])?>">
            </div>
            <button type="submit" class="btn btn-warning">Wijzig</button>
        </form>
    </div>
</main>
<?php require 'footer.php' ?>