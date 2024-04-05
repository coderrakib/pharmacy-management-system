<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Expense'){
    $invoice_id     = $_POST['invoice_id'];
    $category       = $_POST['category'];
    $date           = $_POST['date'];
    $amount         = $_POST['amount'];

    $form_data = array(

        array(

            'field_name'    => 'invoice_id',
            'name'          => 'Invoice ID',
            'required'      => true,
            'min'           => 1,
            'max'           => 50
        ),

        array(

            'field_name'    => 'category',
            'name'          => 'Category',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'date',
            'name'          => 'Date',
            'select'        => true,
            'min'           => 2,
            'max'           => 50
        ),
        array(

            'field_name'    => 'amount',
            'name'          => 'Amount',
            'required'      => true,
            'min'           => 1,
            'max'           => 50
        )
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

          $insert = new Expense;

          if($insert->addExpense($invoice_id, $category, $date, $amount)){

            $message = array("Successfully Added Expense");

            $_SESSION['messages']   = $message;
            $_SESSION['class_name'] = 'border-success';

            header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
           
          }else{

            $message = array("Something is Wrong .. Try again");

            $_SESSION['messages']   = $message;
            $_SESSION['class_name'] = 'border-danger';

            header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
          }   
        }
    } 
}
?>