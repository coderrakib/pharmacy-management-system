<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Manufacturer'){
    $company        = ucwords($_POST['company']);
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $balance        = $_POST['balance'];
    $country        = $_POST['country'];
    $city           = $_POST['city'];
    $state          = $_POST['state'];
    $status         = $_POST['status'];
                    
    $form_data = array(

        array(

            'field_name'    => 'company',
            'name'          => 'Company name',
            'required'      => true,
            'min'           => 4,
            'max'           => 50,
            'unique'        => true,
            'table'         => 'manufacturer',
            'column'        => 'company_name'
        ),

        array(

            'field_name'    => 'email',
            'name'          => 'Email',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'phone',
            'name'          => 'Phone',
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
        ),

        array(
          'field_name'    => 'country',
          'name'          => 'Country',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
        ),

        array(

          'field_name'    => 'city',
          'name'          => 'City',
          'required'      => true,
          'min'           => 2,
          'max'           => 50
        ),

        array(

          'field_name'    => 'state',
          'name'          => 'State',
          'required'      => true,
          'min'           => 5,
          'max'           => 30
        ),
        
        array(

          'field_name'    => 'status',
          'name'          => 'Status',
          'select'        => true,
          'min'           => 1,
          'max'           => 1
        )
  
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

        $insert = new Manufacturer;

          if($insert->addManufacturer($company, $email, $phone, $balance, $country, $city, $state, $status)){

            $message = array("Successfully Added Manufacturer");

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
if( $get_URL == "update"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Update Manufacturer'){
    $get_id         = $_POST['id'];
    $company        = ucwords($_POST['company']);
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $balance        = $_POST['balance'];
    $country        = $_POST['country'];
    $city           = $_POST['city'];
    $state          = $_POST['state'];
             
    $form_data = array(

        array(

            'field_name'    => 'company',
            'name'          => 'Company name',
            'required'      => true,
            'min'           => 4,
            'max'           => 50
        ),

        array(

            'field_name'    => 'email',
            'name'          => 'Email',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'phone',
            'name'          => 'Phone',
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
        ),

        array(
          'field_name'    => 'country',
          'name'          => 'Country',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
        ),

        array(

          'field_name'    => 'city',
          'name'          => 'City',
          'required'      => true,
          'min'           => 2,
          'max'           => 50
        ),

        array(

          'field_name'    => 'state',
          'name'          => 'State',
          'required'      => true,
          'min'           => 5,
          'max'           => 30
        ),
        
        array(

          'field_name'    => 'status',
          'name'          => 'Status',
          'select'        => true,
          'min'           => 1,
          'max'           => 1
        )
  
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

          $update = new Manufacturer;

          $data   = array(

            'company_name', '=', $company,
            'email',        '=', $email,
            'phone',        '=', $phone,
            'balance',      '=', $balance,
            'country',      '=', $country,
            'city',         '=', $city,
            'state',        '=', $state,
          );
          
          $where  = array(
            'id', '=', $get_id,
          );

          if($update->updateManufacturer('manufacturer',$data,$where)){

            $message = array("Successfully Updated Manufacturer");

            $_SESSION['messages']   = $message;
            $_SESSION['class_name'] = 'border-success';

            header("Location: ../manufacturer-list.php");
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