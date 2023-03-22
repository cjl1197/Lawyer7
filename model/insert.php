<?php
            require_once 'dbconnect.php';
            require_once '../fetchVendors.php';


            $prod_id = filter_var($_POST['txtProd_id'], FILTER_SANITIZE_STRING);
            $vend_id = filter_var($_POST['txtVend_id'], FILTER_SANITIZE_STRING);
            $prod_name = filter_var($_POST['txtProd_name'], FILTER_SANITIZE_STRING);
            $prod_price = filter_var($_POST['txtProd_price'], FILTER_SANITIZE_STRING);
            $prod_desc = filter_var($_POST['txtProd_desc'], FILTER_SANITIZE_STRING);

            
            $sqlInsert = "INSERT INTO products (prod_id, vend_id, prod_name, prod_price, prod_desc)
                    VALUES ('$prod_id', '$vend_id', '$prod_name', '$prod_price', '$prod_desc')";

            try {
            $statement = $pdo->prepare($sqlInsert);
            $statement->execute();
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