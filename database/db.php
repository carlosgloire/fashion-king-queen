<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fashion-style", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
