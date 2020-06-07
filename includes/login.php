<?php
if ($_POST['username'] == 'admin' && $_POST['password'] == '123') {
    setcookie('admin', true, time() + 3600, '/');
    header("Location: /");
} else {
    header("Location: ../loginPage.php");
}
