<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Supplier'){
    $name           = ucwords($_POST['name']);
    $manufacturer   = $_POST['manufacturer'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $address        = $_POST['address'];
             
    $form_data = array(

        array(

            'field_name'    => 'name',
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

            'field_name'    => 'email',
            'name'          => 'Email',
            'select'        => true,
            'min'           => 2,
            'max'           => 11
        ),

        array(

            'field_name'    => 'phone',
            'name'          => 'Phone',
            'required'      => true,
            'min'           => 11,
            'max'           => 11
        ),

        array(
          'field_name'    => 'address',
          'name'          => 'Address',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
        ),
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

          $insert = new Suppliers;

          if($insert->addSuppliers($name, $manufacturer, $email, $phone, $address)){

            $message = array("Successfully Added Suppliers");

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