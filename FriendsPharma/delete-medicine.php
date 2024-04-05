<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $medicine =  new Medicine;
    
    if($medicine->deleteMedicine('medicine', $id)){

        $message = array("Successfully Deleted Medicine");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>