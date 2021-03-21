<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <h1>Guest book</h1>
    <a href="sent.php">leave a comment</a>

    <?php
    require_once 'db_config.php';
    $query = "SELECT * FROM user";
    $stmt = $db->prepare($query);
    $stmt->execute();
    ?>

    <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
        <div class="user">
            <div class="user__data">
                <div class="user__name">
                    <?= $row['user_name']; ?>
                </div>
                <div class="user__message">
                    <?= $row['user_message']; ?>
                </div>
            </div>
            <a class="user__remove" href="delete.php?id=<?= $row['id'] ?>">
                remove
            </a>
        </div>
    <?php endforeach; ?>

</body>

</html>
<!-- RewriteEngine On

RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f

RewriteCond %{REQUEST_URI} !^/routing.php

RewriteRule ^(.*)/?$ routing.php?rout=$1 -->