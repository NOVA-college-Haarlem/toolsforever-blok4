<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM brands";
$result = mysqli_query($conn, $sql);
$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);


require 'header.php';
?>

<main>
    <div class="container">
        <h1>Brands</h1>
    </div>
    <div class="container">
        <?php foreach ($brands as $brand) : ?>
            <div class="brand-info">
                <img src="<?php echo isset($brand['brand_image']) ? 'images/brands/' . $brand['brand_image'] : 'https://placehold.co/200' ?>" alt="<?php echo $brand['brand_name'] ?>">
                <h3><?php echo $brand['brand_name'] ?></h3>

            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php' ?>