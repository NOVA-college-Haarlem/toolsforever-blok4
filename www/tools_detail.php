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
                            <a href="add_to_cart.php?id=<?php echo $tool['tool_id']; ?>" class="btn" id="bestelBtn">Bestel</a>
                        </p>
                    </div>
                </div>

            </div>
        <?php else : ?>
            <p>Tool not found.</p>
        <?php endif; ?>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bestelBtn = document.querySelector('#bestelBtn');//anchor tag
        const countSpan = document.querySelector('.cart-count');
        if (bestelBtn && countSpan) {
            bestelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let count = parseInt(countSpan.textContent, 10);
                countSpan.textContent = count + 1;

                // AJAX call naar de server maken
                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        tool_id: <?php echo $tool['tool_id']; ?>
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // eventueel extra feedback aan gebruiker
                        console.log(data)
                    } else {
                        alert('Er is iets misgegaan bij het toevoegen aan de winkelwagen.');
                    }
                })
                .catch(error => {
                    console.table('Serverfout: ' + error);
                });
            });
        }
    });
</script>
<?php require 'footer.php' ?>