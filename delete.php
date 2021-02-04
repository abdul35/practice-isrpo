<?php
if ($url[0] === 'delete' || $url[1] === 'delete') {
    $id = $url[1];
    $query_del = "DELETE FROM user WHERE id = $id";
    $stmt = $db->prepare($query_del);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $count = $stmt->rowCount();
        include_once 'view/index.php';
    } else {
        echo "<a href='index.php'>Main page</a> <br><br>  <mark>No affected rows.</mark>";
    }
}
