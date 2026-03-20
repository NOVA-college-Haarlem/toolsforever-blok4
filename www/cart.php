<?php
require('database.php');

session_start();


$userid = $_SESSION['user_id'];

$sql = "SELECT * FROM cart JOIN tools on tools.tool_id = cart.tool_id WHERE cart.user_id = :userid";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
    "userid" => $userid
]);

$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

include ('header.php');

?>



<table style="position: relative; top: 170px;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Prijs</th>
            <th>Aantal</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($cart_items as $item) { ?>
            <tr>
                <td><? echo $item['tool_name']; ?></td>
                <td><? echo $item['tool_price']; ?></td>
                <td><? echo $item['quantity']; ?></td>
            </tr>
        <?};?>
    </tbody>
</table>