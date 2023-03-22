<?php

function fetch() {
require_once 'dbconnect.php';

global $pdo;

$sqlselect = 'SELECT prod_id, vend_id, prod_name, prod_price, prod_desc
                        FROM products';
        $statement = $pdo->prepare($sqlselect);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;

}
        
?>