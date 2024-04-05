<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Ledger'){
    $invoice        = $_POST['invoice'];
    $date           = $_POST['date'];
    $manufacturer   = $_POST['manufacturer'];
    $payment_term   = $_POST['payment_term'];
    $debit          = $_POST['debit'];
    $credit         = $_POST['credit'];
    $balance        = $_POST['balance'];
           
    $form_data = array(

        array(

            'field_name'    => 'invoice',
            'name'          => 'Invoice',
            'required'      => true,
            'min'           => 4,
            'max'           => 50
        ),

        array(

            'field_name'    => 'date',
            'name'          => 'Date',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'payment_term',
            'name'          => 'Payment Term',
            'select'        => true,
            'min'           => 2,
            'max'           => 11
        ),

        array(

            'field_name'    => 'balance',
            'name'          => 'Balance',
            'required'      => true,
            'min'           => 5,
            'max'           => 20
        )
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

        $insert = new ManufacturerLedger;

          if($insert->addLedger($invoice, $date, $manufacturer, $payment_term, $debit, $credit, $balance)){

            $message = array("Successfully Added Manufacturer Ledger");

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