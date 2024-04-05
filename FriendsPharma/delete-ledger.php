<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $ledger = new ManufacturerLedger;
    
    if($ledger->deleteLedger('manufacturer_ledger', $id)){

        $message = array("Successfully Deleted Manufacturer Ledger");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>