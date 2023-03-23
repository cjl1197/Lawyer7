<?php
            require('dbconnect.php');
            // require('fetch.php');

           // $id = $_POST['prod_id'];

            function updateProducts ($product_id) {

            global $pdo;

            $prod_id = filter_var($_POST['txtProd_id'], FILTER_SANITIZE_STRING);
            $vend_id = filter_var($_POST['txtVend_id'], FILTER_SANITIZE_STRING);
            $prod_name = filter_var($_POST['txtProd_name'], FILTER_SANITIZE_STRING);
            $prod_price = filter_var($_POST['txtProd_price'], FILTER_SANITIZE_STRING);
            $prod_desc = filter_var($_POST['txtProd_desc'], FILTER_SANITIZE_STRING);


            $sqlInsert = "UPDATE products
                        SET prod_id = '$prod_id', vend_id = '$vend_id', prod_name = '$prod_name', prod_price = '$prod_price', prod_desc = '$prod_desc'
                         WHERE prod_id = '$prod_id'";

            try {
            $statement = $pdo->prepare($sqlInsert);
            $statement->execute();
           //$results = $statement->fetchAll();
            $statement->closeCursor();
            //include './index.php';
            }
            catch (PDOException $e) {
                $error  = 'Something went wrong';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                die();
            }
                
            }        
                
        
?>