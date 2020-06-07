<?php
$sort = 'id ASC ';
if (isset($_POST['sort-button'])) {
    switch ($_POST['sort']) {
        case 'by-name-asc':
            $sort = 'username ASC ';
            break;
        case 'by-name-desc':
            $sort = 'username DESC ';
            break;
        case 'by-email-asc':
            $sort = 'email ASC ';
            break;
        case 'by-email-desc':
            $sort = 'email DESC ';
            break;
        case 'by-status-asc':
            $sort = 'status ASC ';
            break;
        case 'by-status-desc':
            $sort = 'status DESC ';
            break;
    }
}
