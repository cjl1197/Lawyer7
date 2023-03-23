<?php
    require('model/dbconnect.php');
    require('model/fetch.php');

    $action = filter_input(INPUT_POST, 'action');


    if ($action == null) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == null) {
            $action ='tableView';
        }
    }
    
  
   if ($action == 'tableView') {
        include('./view/tableView.php');
   }

   else if ($action == 'insert') {
        include('./view/insertForm.php');
   }

   else if ($action == 'update') {
        include('./view/insertForm.php');
   }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <base href='Lawyer7' />
</head>
<body>
     
</body>
</html> -->