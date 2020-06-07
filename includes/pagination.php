<?php
include 'config.php';

$result_per_page = 3;

$result = mysqli_query($connection, "SELECT * FROM TaskbookUsers");

$number_of_pages = ceil(mysqli_num_rows($result) / $result_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$page_result = ($page - 1) * $result_per_page;
