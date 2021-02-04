<?php
$url = explode('/', $_GET['rout']);
if (isset($_GET['rout']) && !empty($_GET['rout'])) {

    include_once 'db_config.php';

    if ($url[1] === 'delete' || $url[0] === 'delete') {

        include_once 'delete.php';
    } elseif ($url[1] === 'sent.php' || $url[0] === 'sent.php') {

        include_once 'sent.php';
    } elseif ($url[1] === 'index.php' || $url[0] === 'index.php') {

        include_once 'view/index.php';
    }
} else {

    include_once 'view/index.php';
}

exit();
