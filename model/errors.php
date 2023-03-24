<?php
    if (isset($_GET['message'])) 
        $error_message = $_GET['message'];
    else 
        $error_message = 'An unknown error occurred';
        // do something with the error message

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            background-color: #ddd;
            text-align: center;
        }
     
    </style>
</head>
<body>
    <h2 style="background-color: #d3d3d3">Something went wrong</h2>
    <p style="background-color: #d3d3d3"><?php echo "Unable to connect to the database server" ?></p>
    <p><?php echo $error_message ?></p>
    <a href="http://localhost:8080/Lawyer7" >Home</a>
</body>
</html>