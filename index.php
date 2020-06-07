<?php require "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "includes/head.php"; ?>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <h1 class="navbar-brand">TaskbookApp</h1>
        <!-- checking is admin authorize and shows, if not authorize button, if authorized exit button -->
        <? if (empty($_COOKIE['admin'])) : ?>
        <a href="loginPage.php"><button class="btn btn-outline-success" type="button">Авторизоваться</button></a>
        <? else : ?>
        <a href="includes/exit.php"><button class="btn btn-outline-danger" type="button">Выйти</button></a>
        <? endif ?>
    </nav>

    <?php
    // including external files
    include 'includes/pagination.php';
    include 'includes/sort.php';

    // initialize variables by assigning the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // checking validation of the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        echo '<span style="color:red;">Неверный формат электронной почты</span>';
    } else {
        // checks that is pressed the send button and not empty the form data
        if (isset($_POST['send']) && !empty($email) && !empty($username) && !empty($text)) {
            echo '<span style="color:green;">Задача добавлена </span>';
            // add to database data from form
            mysqli_query($connection, "INSERT INTO `TaskbookUsers`( `username`, `email`, `text` ) 
        VALUES ('" . $username . "', '" . $email . "', '" . $text . "' ) ");
        } else {
            echo '<span style="color:red;">Заполните все поля</span>';
        }
    }
    // sort by selected value
    $taskbook_query = mysqli_query($connection, "SELECT * FROM `TaskbookUsers` ORDER BY " . $sort . " LIMIT " . $page_result . ',' . $result_per_page);

    // save the true if admin authorized
    $isAdmin = $_COOKIE['admin'];

    ?>

    <div class="container">
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Text</label>
                <textarea class="form-control" name="text" cols="25" rows="5"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="send">

            <div class="col-12">
                <select class="form-control select" name="sort">
                    <option value="by-name-asc">имя пользователя по возрастанию</option>
                    <option value="by-name-desc">имя пользователя по убыванию</option>
                    <option value="by-email-asc">email по возрастанию</option>
                    <option value="by-email-desc">email по убыванию</option>
                    <option value="by-status-asc">статус по возрастанию</option>
                    <option value="by-status-desc">статус по убыванию</option>
                </select>
                <input type="submit" class="btn btn-secondary" value="sort" name="sort-button">

        </form>
        <!-- show the data from the database via loop -->
        <? while ($taskbook = mysqli_fetch_assoc($taskbook_query)) : ?>
        <div class="col-7">
            <form action="" method="post">
                <!-- hidden value for sending the email of the checked or changed value  -->
                <input type="hidden" name="email_check" value="<?echo $taskbook['email'];?>">
                <h6 class="status">
                    <?php
                    if ($isAdmin) {

                        echo '<input type="checkbox" name="check">';
                    }
                    echo ' Cтатус: ' . $taskbook['status']; ?>
                </h6>
                <h4 class="heading">
                    <? echo $taskbook['username']  ?>
                </h4>
                <h6 class="status">
                    <?php
                    if ($taskbook['isChange']) {
                        echo 'отредактировано администратором';
                    }
                    ?>
                </h6>
                <h5 class="heading">
                    <? echo $taskbook['email']; ?>
                </h5>

                <p>
                    <?php
                    if ($isAdmin) {
                        // admin can change the text of user by using textarea
                        echo '<textarea class="form-control" name="text-change" cols="30" rows="5">' . $taskbook['text'] . '</textarea>';
                    } else
                        echo $taskbook['text'];
                    ?>
                </p>
                <? if ($isAdmin){ ?>
                <input type="submit" value="save" name="save">
                <? } ?>
            </form>
        </div>
        <? endwhile; ?>

        <!-- pagination -->
        <ul class="pagination">
            <?php
            include 'includes/admin.php';
            for ($page = 1; $page <= $number_of_pages; $page++) {
                echo ' <li class="page-item"><a class="page-link" href="../index.php?page=' . $page . '">' . $page . '</a><?li>  ';
            }
            ?>
        </ul>
    </div>

    </div>
</body>

</html>