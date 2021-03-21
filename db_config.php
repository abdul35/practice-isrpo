<?php


/* Подключение к базе данных MySQL с помощью вызова драйвера */
$DSN = 'mysql:dbname=guest_book;host=127.0.0.1';
$USERNAME = 'root';
$PASSWORD = '';

try {
    $db = new PDO($DSN, $USERNAME, $PASSWORD);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
