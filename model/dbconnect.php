<?php

    $dsn = 'mysql:host=localhost:3306;dbname=crashcourse';

    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e) {
        $error  = 'Unable to connect to the department database';
        $exceptionError = $e->getMessage();
        include 'errors.php';
        die();
    }



?>