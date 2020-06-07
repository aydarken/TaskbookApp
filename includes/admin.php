<?php
if (isset($_POST['save'])) {
    $email_user = $_POST['email_check'];

    if (isset($_POST['check'])) {
        mysqli_query($connection, "UPDATE `TaskbookUsers` SET `status` = 'выполнено' WHERE `email` = '" . $email_user  . "'");
    }

    $new_text = $_POST['text-change'];
    $sql = mysqli_query($connection, "SELECT `text` FROM `TaskbookUsers` WHERE `email` = '" . $email_user . "'");
    $origin_text = mysqli_fetch_assoc($sql);

    if ($origin_text['text'] != $new_text) {
        mysqli_query($connection, "UPDATE `TaskbookUsers` SET `isChange` = 'true' WHERE `email` = '" . $email_user  . "'");
        mysqli_query($connection, "UPDATE `TaskbookUsers` SET `text` = '" . $new_text . "' WHERE `email` = '" . $email_user  . "'");
    }
}
