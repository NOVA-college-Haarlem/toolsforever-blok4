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


require 'database.php';

$sql = "SELECT * FROM tools JOIN brands ON brands.brand_id = tools.tool_brand";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tools = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>
<main>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Categorie</th>
                <th>Prijs</th>
                <th>Merk</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tools as $tool) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($tool['tool_name']) ?></td>
                    <td><?php echo htmlspecialchars($tool['tool_category']) ?></td>
                    <td><?php echo htmlspecialchars($tool['tool_price']) ?></td>
                    <td><?php echo htmlspecialchars($tool['brand_name']) ?></td>
                    <td>

                        <a href="tools_detail.php?id=<?php echo $tool['tool_id'] ?>">Bekijk</a>
                     
                        <a href="tools_edit.php?id=<?php echo $tool['tool_id'] ?>">Wijzig</a>
                        <a href="tools_delete.php?id=<?php echo $tool['tool_id'] ?>"
                        onclick="return confirm('weet je het zeker dat je deze tool wilt verwijderen?')"
                        >
                        Verwijderen
                        </a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php require 'footer.php' ?>