<?php

session_start();

if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === 'justina' && password_verify($_POST['password'], password_hash('password123', PASSWORD_DEFAULT))) {
            $_SESSION['user_id'] = $_POST['username'];
            header('location:admin.php');
        } else {
            header('location:login.php?fail=1');
        }
    }
}

?>