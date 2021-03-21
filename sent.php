<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'db_config.php';
    $data_saved;
    if (!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_message'])) {
        $query_sent = "INSERT INTO `user` (`user_name`,`email`,`user_message`) VALUES (:user_name, :email, :user_message)";

        $params = [
            ':user_name' => $_POST['user_name'],
            ':email' => $_POST['user_email'],
            ':user_message' => $_POST['user_message'],
        ];

        $stmt = $db->prepare($query_sent);
        $stmt->execute($params);
        if ($stmt->rowCount()) {
            $data_saved = 'ok';
        }
    } else {
        $data_saved = 'warning';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend_practice</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body>

    <header>
        <a href="index.php">Main page</a>
    </header>

    <div class="container">
        <form class="user__form" action="" method="POST">
            <div>
                <input class="user-namein" type="text" name="user_name" placeholder="you'r name">
            </div>
            <div>
                <input class="user-emailin" type="email" name="user_email" placeholder="you'r email">
            </div>
            <div>
                <textarea class="user-message" name="user_message" id="" cols="30" rows="10" placeholder="message"></textarea>
            </div>
            <div>
                <button type="submit" name="save">Add comment</button>
            </div>
            <?php if ($data_saved === 'ok') : ?>
                <div class="succesfully-save">
                    Comment saved successfuly!
                </div>
            <?php elseif ($data_saved === 'warning') : ?>
                <h3 class="warning">Please, filling all fields!</h3>
            <?php endif; ?>
            <?php $data_saved = ''; ?>
        </form>

    </div>
    <script>
        let alertSuccess = document.querySelector('.succesfully-save'),
            warning = document.querySelector('.warning');
        if (alertSuccess) setTimeout(() => alertSuccess.style.opacity = '0', 3500);
        if (warning) setTimeout(() => warning.style.opacity = '0', 4500);
    </script>
</body>

</html>