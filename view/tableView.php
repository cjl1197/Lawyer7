<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='styles/styles.css' type='text/css'>
    <!-- <link rel='validate' href='../model/validate.php'> -->
    <title>Lawyer 7</title>
</head>
<body>
<header>
    <h1>Lawyer Project 7</h1>
     <script>
        // function to confirm deletion by the user
        function confirmDelete(button) {
            var id = button.getAttribute('data-product-id');
            var name = button.getAttribute('data-product-name');
            
            return confirm("Are you sure you want to delete Product: " + name + ' ID: ' + id + '?');
        }
    </script>
    <?php
    
        //require_once 'model/dbconnect.php'; // db connection 
        //require_once 'model/fetch.php'; // fetch request for product data
        $fetchAll = fetch();
        //require_once 'model/fetchVendors.php'; // fetch request for vendors data
        $fetchVendors = fetchVendors();
   
    ?>
</header>
<main>
        <input type="hidden" name="page" id="insert" value="insert">
            <a href="view/insertForm.php?_hidden_value=insert">Add a New Product</a>
            
        <table class="department-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Vendor Name</th>
                    <th>Vendor ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                    <?php foreach ($fetchAll as $row) {  
                        echo "<tr>";
                        echo "<form method='post' action='insertForm'>";
                        echo "<td>" . $row['prod_id'] . "</td>";
                            foreach ($fetchVendors as $vendor) {
                                if ($row['vend_id'] == $vendor['vend_id']){
                                echo "<td>" . $vendor['vend_name'] . "</td>";
                                echo "<input type='hidden' name='txtVend_name' value='" . $vendor['vend_name'] . "'>";
                                }
                            }
                        echo "<td>" . $row['vend_id'] . "</td>";
                        echo "<td>" . $row['prod_name'] . "</td>";
                        echo "<td>" . '$' . $row['prod_price'] . "</td>";
                        echo "<td>" . $row['prod_desc'] . "</td>";
                        echo "<td>";
                        echo "<button type='submit' name='update'>Update</button>";
                        echo "<input type='hidden' name='page' value='update'>";
                        echo "<input type='hidden' name='txtProd_id' value='" . $row['prod_id'] . "'>";
                        echo "<input type='hidden' name='txtVend_id' value='" . $row['vend_id'] . "'>";
                        echo "<input type='hidden' name='txtProd_name' value='" . $row['prod_name'] . "'>";
                        echo "<input type='hidden' name='txtProd_price' value='" . $row['prod_price'] . "'>";
                        echo "<input type='hidden' name='txtProd_desc' value='" . $row['prod_desc'] . "'>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='post' action='model/validate'>";
                        echo "<input type='hidden' name='prod_id' value='" . $row['prod_id'] . "'>";
                        echo "<button type='submit' onclick='return confirmDelete(this);' data-product-id='" . $row['prod_id'] . "' data-product-name='" . $row['prod_name'] . "' name='delete'>Delete</button>";
                        echo "</form>";
                       
                        echo "</td>";
                        echo "</tr>";
                    }
            ?>

            </tbody>
        </table>
                    
                

</main>
<footer>

</footer>
</body>
</html>