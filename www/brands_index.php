<?php
session_start();
require 'database.php';

$stmt = $conn->prepare("SELECT * FROM brands");
$stmt->execute();
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);


require 'header.php';
?>

<main>
    <div class="container">
        <h1>Brands</h1>
    </div>
    <div class="container">
        <?php foreach ($brands as $brand) : ?>
            <div class="brand-info">
                <img src="<?php echo isset($brand['brand_image']) ? 'images/' . $brand['brand_image'] : 'https://placehold.co/200' ?>" alt="<?php echo $brand['brand_name'] ?>">
                <h3><?php echo $brand['brand_name'] ?></h3>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                    <a href="brands_edit.php?id=<?php echo $brand['brand_id']?>">edit</a>
                <?php } ?>


            
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php' ?>