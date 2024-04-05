<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $expense =  new Expense;
    
    if($expense->deleteExpense('expense', $id)){

        $message = array("Successfully Deleted Expense");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>