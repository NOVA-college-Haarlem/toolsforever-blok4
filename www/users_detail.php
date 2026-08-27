<?php

session_start();

require 'database.php';

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM users LEFT JOIN user_settings ON user_settings.user_id = users.id WHERE users.id =  $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


require 'header.php';

?>

<main>
    <div class="container">
        <?php if (isset($user)) : ?>
            <div class="user-detail">
                <h3><?php echo $user['firstname'] ?></h3>
                <p><?php echo $user['lastname'] ?></p>
                <p><?php echo $user['email'] ?></p>
                <p><?php echo $user['role'] ?></p>
                <p><?php echo $user['address'] ?></p>
                <p><?php echo $user['city'] ?></p>
                <p><?php echo $user['is_active'] == 1 ? "is actief" : "Is niet actief"  ?></p>
                <p><?php echo $user['backgroundColor'] ?></p>
                <p><?php echo $user['font'] ?></p>
            <?php else : ?>
                Geen gebruiker gevonden
            <?php endif; ?>
</main>
<?php require 'footer.php' ?>