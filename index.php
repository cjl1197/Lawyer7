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

?>