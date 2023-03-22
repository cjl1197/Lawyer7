<?php
            require_once 'dbconnect.php';
            //require_once 'index.php';

            
          
            $id = $_POST['prod_id'];

            

           $sqlDelete = "DELETE FROM products WHERE prod_id = :prod_id";

            try {
            $statement = $pdo->prepare($sqlDelete);
            $statement->execute(['prod_id' => $id]);
            // $results = $statement->fetchAll();
            $statement->closeCursor();
            include '../index.php';
            }
            catch (PDOException $e) {
                $error  = 'Something went wrong';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                die();
            }
                
                
                
        
?>