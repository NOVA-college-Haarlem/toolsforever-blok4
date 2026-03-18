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

$sql = "SELECT * FROM users WHERE deleted_at IS NOT NULL";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>
<main>
    <h1>Verwijderde gebruikers</h1>
    <div class="container">


        <table>
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['firstname'] ?></td>
                        <td><?php echo $user['lastname'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['role'] ?></td>
                        <td>
                            <a href="users_detail.php?id=<?php echo $user['id'] ?>">Bekijk</a>
                            Wijzig
                    
                            <!-- <a href="users_edit.php?id=<?php echo $user['id'] ?>">Wijzig</a>  -->
                            <a href="users_restore.php?id=<?php echo $user['id'] ?>">Herstel</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php require 'footer.php' ?>