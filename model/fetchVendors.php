<?php
        require_once('dbconnect.php');
function fetchVendors() {

        global $pdo;

        $sqlselect = 'SELECT DISTINCT vend_name, vend_id
                        FROM vendors';
                $statement = $pdo->prepare($sqlselect);
                $statement->execute();
                $results2 = $statement->fetchAll();
                $statement->closeCursor();

        return $results2;

}
?>