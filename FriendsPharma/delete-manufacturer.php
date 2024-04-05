<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $manufacturer = new Manufacturer;
    
    if($manufacturer->deleteManufacturer('manufacturer', $id)){

        $message = array("Successfully Deleted Manufacturer");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>