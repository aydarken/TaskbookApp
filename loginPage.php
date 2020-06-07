<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "includes/head.php"; ?>
</head>

<body>
    <?php

    if (empty($_COOKIE['admin'])) {
        echo '<span style="color:red">Данные неверные</span>';
    } else
        echo '<span style="color:green">Вы авторизовались</span>';

    ?>
    <div class="login-form">
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="Log in">
        </form>
    </div>
</body>

</html>