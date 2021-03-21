<?php
require_once 'db_config.php';
$id  = $_GET['id'];
if (isset($id)) {
    $query_del = "DELETE FROM user WHERE id = $id";
    $stmt = $db->prepare($query_del);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $count = $stmt->rowCount();
        header('location:index.php');
    } else {
        echo "<a href='index.php'>Main page</a> <br><br>  <mark>No affected rows.</mark>";
    }
}
