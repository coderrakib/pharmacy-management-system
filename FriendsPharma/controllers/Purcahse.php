<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Purchase'){
    $name           = $_POST['supplier_name'];
    $manufacturer   = $_POST['manufacturer'];
    $qnt            = $_POST['qnt'];
    $uprice         = $_POST['uprice'];
    $amount         = $_POST['amount'];
    $date           = $_POST['date'];
    $categories     = $_POST['categories'];
    $notes          = $_POST['notes'];
             
    $form_data = array(

        array(

            'field_name'    => 'supplier_name',
            'name'          => 'Suppliers name',
            'required'      => true,
            'min'           => 4,
            'max'           => 50
        ),

        array(

            'field_name'    => 'manufacturer',
            'name'          => 'Manufacturer',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'qnt',
            'name'          => 'Quantity',
            'select'        => true,
            'min'           => 1,
            'max'           => 20
        ),

        array(

            'field_name'    => 'uprice',
            'name'          => 'Unit Price',
            'required'      => true,
            'min'           => 1,
            'max'           => 20
        ),

        array(
          'field_name'    => 'amount',
          'name'          => 'Total Amount',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
        ),
        array(
            'field_name'    => 'date',
            'name'          => 'Date',
            'required'      => true,
            'min'           => 2,
            'max'           => 20
        ),
        array(
            'field_name'    => 'categories',
            'name'          => 'Categories',
            'required'      => true,
            'min'           => 2,
            'max'           => 20
        ),
        array(
            'field_name'    => 'notes',
            'name'          => 'Notes',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

          $insert = new Purcahse;

          if($insert->addPurcahse($name, $manufacturer, $qnt, $uprice, $amount, $date, $categories, $notes)){

            $message = array("Successfully Added Purcahse");

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