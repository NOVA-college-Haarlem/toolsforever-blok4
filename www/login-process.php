<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            require 'database.php';

            $sql = "SELECT * FROM users WHERE email= :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                "email" => $emailForm
            ]);

            $dbuser = $stmt->fetch(PDO::FETCH_ASSOC);

            if(is_bool($dbuser))
            {
                die('no user found');
            }

            //als de email bestaat dan is het resultaat groter dan 0
            if (count($dbuser) > 0) {
                

                // if ($dbuser['password'] == $passwordForm) {
                if(password_verify($passwordForm, $dbuser['password'])){

                    session_start();
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
