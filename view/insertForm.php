<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title 255>
    <base href="http://localhost:8080/Lawyer7/" />
    <link rel="stylesheet" href="styles/insertForm.css">

    
</head>
<body>
    <header>
        <h1>Lawyer Project 7</h1>
        <?php
        // include('../model/fetch.php');
           $fetchVendors =  fetchVendors();

            // if the submit button has not been clicked it sets the error messages to empty strings
              if (!isset($_POST['btnSubmit'])) {
            $errormsgprod_id = '';
            $errormsgprod_name = '';
            $errormsgvend_id = '';
            $errormsgprod_price = '';
            $errormsgprod_desc = '';
            $notValid = false;
            }
         
      

            if (isset($_POST['page'])){ 
            $page = $_POST['page'];
            }
            else 
                $page = 'insert'; 
            

            if($page == 'update') {
                $prod_id = filter_var($_POST['txtProd_id'], FILTER_SANITIZE_STRING);
                //$vend_name = filter_var($_POST['txtVend_name'], FILTER_SANITIZE_STRING);
                $vend_id = filter_var($_POST['txtVend_id'], FILTER_SANITIZE_STRING);
                $prod_name = filter_var($_POST['txtProd_name'], FILTER_SANITIZE_STRING);
                $prod_price = filter_var($_POST['txtProd_price'], FILTER_SANITIZE_STRING);
                $prod_desc = filter_var($_POST['txtProd_desc'], FILTER_SANITIZE_STRING);

                $message = 'Update a Product';
             
            }
            else if ($page = 'insert'){

                $message = "Add a Product";
                $vend_name = '';
                $vend_id = '';
            }
        
             foreach ($fetchVendors as $vendor) {
                        if ($vendor['vend_id'] == $vend_id)
                            $vend_name = $vendor['vend_name'];
                    }
        
            
        ?>
     
    </header>
    <main>
        <form name="product_info" action="model/validate.php" method="POST">
                <h2><?php echo $message ?> </h2>
                <div class="box">
                <label for="prod_id"class="prod_id" >Product ID</label>
                    <input type="text" name="txtProd_id" id="prod_id" placeholder="Product ID"
                        value="<?php if(isset($prod_id)) echo $prod_id; ?>">
                        <input type="hidden" name="prod_id" id="prod_id" value="prod_id">
                        <span id="errormsgprod_id" class="error">
                            <?php (!empty($errormsgprod_id)) && print($errormsgprod_id)?>
                        </span>
                </div>
                <div class="box">
                    <label for="vend_name"class="vend_name" >Vendor</label>
                        <select name='txtVend_id'>
                            <?php 
                                foreach ($fetchVendors as $vendor): ?>
                                    <option value="<?php echo $vendor['vend_id']; ?>"
                                        <?php if($vend_name == $vendor['vend_name']) echo 'selected'; 
                                              else if(isset($_POST['txtVend_id']) && $_POST['txtVend_id'] == $vendor['vend_id']) echo 'selected="selected"'
                                        ?>>
                                    <?php echo $vendor['vend_name'] . ' - ' . $vendor['vend_id']; ?>
                                    </option>
                                   
                              <?php  endforeach ?>
                            
                        </select>
                </div>
                <div class="box">
                <label for="prod_name" class="prod_name" >Product Name</label>
                    <input type="text" name="txtProd_name" id="prod_name" placeholder="Product Name" 
                        value="<?php if(isset($prod_name)) echo $prod_name; ?>">
                        <span id="errormsgprod_name" class="error">
                            <?php (!empty($errormsgprod_name)) && print($errormsgprod_name)?>
                        </span>

                <div class="box">
                <label for="prod_price">Product Price</label>
                    <input type="text" name="txtProd_price" id="prod_price" placeholder="Product Price" 
                        value="<?php if(isset($prod_price)) echo $prod_price; ?>">
                        <span id="errormsgprod_price" class="error">
                            <?php (!empty($errormsgprod_price)) && print($errormsgprod_price)?>
                        </span>
                </div>
                <div class="box">
                <label for="prod_desc">Product Description</label>
                    <input type="text" name="txtProd_desc" id="prod_desc" placeholder="Product Description" 
                        value="<?php if(isset($prod_desc)) echo $prod_desc; ?>">
                        <span id="errormsgprod_desc" class="error">
                            <?php (!empty($errormsgprod_desc)) && print($errormsgprod_desc)?>
                        </span>
                </div>
                    <input type="hidden" name="<?php echo $page ?>" id="insertForm" value="insertForm">
                <div class="box">
                        <label for="submit" class="button">Submit</label>
                        <input type="hidden" name="page" value="<?php if ($page == 'update') echo 'update'; ?>">
                <input type="submit" value="Submit" id="submit" name="btnSubmit">
                </div>
        </form>

                <input type="hidden" name="acton" id="tableView" value="tableView">
                    <a href="index.php">Home Page</a>
    </main>
    <footer>

    </footer>
    
</body>
</html>