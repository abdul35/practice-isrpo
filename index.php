<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require_once 'db_config.php'; ?>

    <h1>Guest book</h1>

    <a href="sent.php">leave a comment</a>

    <?php
    if ($_GET['action'] === 'delete') {
        // print_r($_GET['id']);
        $id = $_GET['id'];



        $query_sent = "DELETE FROM `user` WHERE $id";
        $stmt = $db->prepare($query_sent);
        $stmt->execute();
        // header('location:index.php');
    }
    ?>
    <?php $stmt = $db->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC); ?>

    <?php foreach ($stmt as $row) : ?>
        <div class="user">
            <div class="user__data">
                <div class="user__name">
                    <?= $row['user_name']; ?>
                </div>
                <div class="user__message">
                    <?= $row['user_message']; ?>
                </div>
            </div>
            <a class="user__remove" name="remove" href="?delete=<?= $row['id']; ?>">
                remove
            </a>
        </div>
    <?php endforeach; ?>


</body>

</html>