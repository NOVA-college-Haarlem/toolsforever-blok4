<?php
session_start();

require 'database.php';

if (isset($_GET['id'])) {
    $tool_id = $_GET['id'];
    $sql = "SELECT * FROM tools WHERE tool_id = :tool_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        "tool_id" => $tool_id
    ]);
    $tool = $stmt->fetch(PDO::FETCH_ASSOC);

}
require 'header.php';
?>

<main>
    <div class="container">
        <?php if (isset($tool)) : ?>
            <div class="product-detail">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo isset($tool['tool_image']) ? 'images/' . $tool['tool_image'] : 'https://placehold.co/200' ?>" alt="<?php echo $tool['tool_name'] ?>">
                    </div>
                    <div class="col">
                        <h3><?php echo $tool['tool_name'] ?></h3>
                        <p><?php echo $tool['tool_brand'] ?></p>
                        <p><?php echo $tool['tool_category'] ?></p>
                        <p>€ <?php echo number_format($tool['tool_price'] / 100, 2, ',', '') ?></p>
                        <p>
                            <a href="add_to_cart.php?id=<?php echo $tool['tool_id']; ?>" class="btn">Bestel</a>
                        </p>
                    </div>
                </div>

            </div>
        <?php else : ?>
            <p>Tool not found.</p>
        <?php endif; ?>
    </div>
</main>
<?php require 'footer.php' ?>