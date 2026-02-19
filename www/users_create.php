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
require 'header.php';

?>

<main>
    <div class="container">
        <form action="users_add_process.php" method="post">
            <div>
                <label for="firstname">Voornaam:</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div>
                <label for="lastname">Achternaam:</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="address">Adres:</label>
                <input type="text" id="address" name="address">
            </div>
            <div>
                <label for="city">Stad:</label>
                <input type="text" id="city" name="city">
            </div>
            <div>
                <label for="backgroundColor">kleur:</label>
                <input type="color" id="backgroundColor" name="backgroundColor">
            </div>
            <div>
                <label for="city">Lettertype:</label>
                <select id='select' onChange="return fontChange();" name="font">
                </select>
            </div>
            <div>
                <label for="role">Rol:</label>
                <select id="role" name="role">
                    <option value="">Selecteer Rol</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Werknemer</option>
                </select>
            </div>

            <input type="submit" value="Add User">
        </form>
    </div>
</main>
<?php require 'footer.php' ?>