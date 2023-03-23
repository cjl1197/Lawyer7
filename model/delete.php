<?php
            require_once 'dbconnect.php';
            //require_once 'index.php';

            
            function deleteProduct ($product_id) {

           // $id = $_POST['prod_id'];
           

            global $pdo;

           $sqlDelete = "DELETE FROM products WHERE prod_id = :prod_id";

            try {
            $statement = $pdo->prepare($sqlDelete);
            $statement->execute(['prod_id' => $product_id]);
            // $results = $statement->fetchAll();
            $statement->closeCursor();
            //include '../index.php';

      
            }
            catch (PDOException $e) {
                $error  = 'Something went wrong';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                die();
            }
                
                
        }      
        
?>