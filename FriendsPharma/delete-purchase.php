<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $purcahse =  new Purcahse;
    
    if($purcahse->deletePurcahse('purcahse', $id)){

        $message = array("Successfully Deleted Purcahse");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>