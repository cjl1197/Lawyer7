<?php

    if(isset($_POST['btnSubmit'])) {
       
        $submitted = true;
        

        $prod_id = filter_var($_POST['txtProd_id'], FILTER_SANITIZE_STRING);
        $vend_id = filter_var($_POST['txtVend_id'], FILTER_VALIDATE_INT);
        $prod_name = filter_var($_POST['txtProd_name'], FILTER_SANITIZE_STRING);
        $prod_price = filter_var($_POST['txtProd_price'], FILTER_SANITIZE_STRING);
        $prod_desc = filter_var($_POST['txtProd_desc'], FILTER_SANITIZE_STRING);
        
       

        $prod_id_valid = false;
        $vend_id_valid = false;
        $prod_name_valid = false;
        $prod_price_valid = false;
        $prod_desc_valid = false;
        $vend_name_valid = false;

        
        // $options = array(
        //     'min_range' => 100000,
        //     'max_range' => 999999
        //   );
          
        
        if ($prod_id == null) 
            
            $errormsgprod_id = "Please enter a product ID.";
         
        else if (strlen($prod_id) > 10)
            
            $errormsgprod_id = "Product ID can't exceed 10 characters in length.";
        else {

            $prod_id_valid = true;
            $errormsgprod_id ="";
        }
            
        if ($vend_id == null) {
            $errormsgvend_id = "Please select a vendor.";
        }
        // else if (strlen($vend_id) >= 20)
        
        //     $errormsgvend_id = "Department name can't be longer that 20 characters.";      

        // else if (!preg_match('/^[0-9]+$/', $department_name))
            
        //     $errormsgvend_id = "Department name can only contain letters.";
            
        else {

            $vend_id_valid = true;
            $errormsgvend_id = "";
        }
        
        if ($prod_name == null) 

            $errormsgprod_name = "Please enter a product name.";

        else if (strlen($prod_name) > 255)

            $errormsgprod_name = "Product name can't exceed 255 characters in length.";

        else {

            $prod_name_valid  = true;
            $errormsgaccountnumber = "";
        }

        if ($prod_price == null) 
        
            $errormsgprod_price = "Please enter a product price. Example: 75.00";

        else if (!preg_match('/^\d{1,8}(\.\d{1,2})?$/', $prod_price))

            $errormsgprod_price = "Please enter numbers and decimals only.";
        
        else{
            $prod_price_valid = true;
            $errormsgprod_price = "";
        }
        
        if ($prod_desc == null) 

            $errormsgprod_desc = "Please enter a product description.";

        else {
            $prod_desc_valid = true;
            $errormsgprod_desc = "";
        }
    }
   
    if(isset($_POST['insert'])) {
        if ($prod_id_valid AND $vend_id_valid AND $prod_name_valid AND $prod_price_valid AND $prod_desc_valid)

            include('insert.php');
        else

            include('../insertForm.php');
    }
   else if(isset($_POST['update'])) {
        if ($prod_id_valid AND $vend_id_valid AND $prod_name_valid AND $prod_price_valid AND $prod_desc_valid){
           include('update.php');
        }
        else

            include('../insertForm.php');
   }
    else if (isset($_POST['prod_id'])) {
        include('delete.php');
    }

?>