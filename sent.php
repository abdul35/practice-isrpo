<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend_practice</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require 'db_config.php'; ?>

    <a href="index.php">Main page</a>

    <form class="user__form" action="" method="POST">
        <div>
            <input class="user-namein" type="text" name="user_name" placeholder="you'r name">
            <input class="user-emailin" type="email" name="user_email" placeholder="you'r email">
        </div>
        <div>
            <textarea class="user-message" name="user_message" id="" cols="30" rows="10" placeholder="message"></textarea>
        </div>


        <button type="submit" name="save">Sent massega</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // print_r($_POST);
        // if ()
        if (!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_message'])) {

            $query_sent = "INSERT INTO `user` (`user_name`,`email`,`user_message`) VALUES (:user_name, :email, :user_message)";

            $params = [
                ':user_name' => $_POST['user_name'],
                ':email' => $_POST['user_email'],
                ':user_message' => $_POST['user_message'],
            ];

            $stmt = $db->prepare($query_sent);
            $stmt->execute($params);
        } else {
            echo '<h3 class="warning">Please, filling all fields!</h3>';
        }
    }
    ?>

</body>

</html>