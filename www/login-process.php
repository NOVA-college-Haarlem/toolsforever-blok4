<?php

session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            $conn = mysqli_connect('mariadb', 'root', 'password', 'tools4ever');

            $sql = "SELECT * FROM users WHERE email='$emailForm'";
            $result = mysqli_query($conn, $sql);

            //als de email bestaat dan is het resultaat groter dan 0
            if (mysqli_num_rows($result) > 0) {

                //resultaat gevonden? Dan maken we een user-array $dbuser
                $dbuser = mysqli_fetch_assoc($result);

                if ($dbuser['password'] == $passwordForm) {

                    $_SESSION['user_id']    = $dbuser['id'];
                    $_SESSION['email']      = $dbuser['email'];
                    $_SESSION['firstname']  = $dbuser['firstname'];
                    $_SESSION['lastname']   = $dbuser['lastname'];
                    $_SESSION['role']       = $dbuser['role'];

                    // echo "You are logged in";
                    header("Location: dashboard.php");
                    exit;
                } else {
                    include 'header.php';
                    $_GET['message'] = 'wrongpassword';
                    include 'login-message.php';
                    include 'footer.php';
                    exit;
                }
            } else {
                include 'header.php';
                $_GET['message'] = 'usernotfound';
                include 'login-message.php';
                include 'footer.php';
                exit;
            }
        }
    }
}

include 'footer.php';
