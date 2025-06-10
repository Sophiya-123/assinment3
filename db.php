<?php
$host = 'localhost'; // Change if your database is hosted elsewhere
$dbname = 'a30093447_DB';
$username = 'a30093447_user';
$password = 'Toiohomai1234';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
