<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $suppliers =  new Suppliers;
    
    if($suppliers->deleteSupplier('suppliers', $id)){

        $message = array("Successfully Deleted Supplier");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>