<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Medicine'){
    $medicine_name  = ucwords($_POST['medicine_name']);
    $generic_name   = $_POST['generic_name'];
    $sku            = $_POST['sku'];
    $mg             = $_POST['mg'];
    $categories     = $_POST['categories'];
    $manufacturer   = $_POST['manufacturer'];
    $price          = $_POST['price'];
    $mprice         = $_POST['mprice'];
    $stock          = $_POST['stock'];
    $expire_date    = $_POST['expire_date'];
    $status         = $_POST['status'];
    $description    = $_POST['description'];
    
    $form_data = array(

        array(

            'field_name'    => 'medicine_name',
            'name'          => 'Medicine Name',
            'required'      => true,
            'min'           => 4,
            'max'           => 50,
            'unique'        => true,
            'table'         => 'medicine',
            'column'        => 'medicine_name'
        ),

        array(

            'field_name'    => 'generic_name',
            'name'          => 'Generic Name',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'sku',
            'name'          => 'SKU',
            'select'        => true,
            'min'           => 2,
            'max'           => 20
        ),

        array(

            'field_name'    => 'mg',
            'name'          => 'MG',
            'required'      => true,
            'min'           => 2,
            'max'           => 20
        ),

        array(
          'field_name'    => 'categories',
          'name'          => 'Category',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
        ),

        array(

          'field_name'    => 'manufacturer',
          'name'          => 'Manufacturer',
          'required'      => true,
          'min'           => 2,
          'max'           => 50
        ),

        array(

          'field_name'    => 'price',
          'name'          => 'Price',
          'required'      => true,
          'min'           => 2,
          'max'           => 50
        ),
        
        array(

          'field_name'    => 'mprice',
          'name'          => 'Manufacturer Price',
          'select'        => true,
          'min'           => 2,
          'max'           => 50
        ),

        array(

            'field_name'    => 'stock',
            'name'          => 'Stock',
            'select'        => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'expire_date',
            'name'          => 'Expire Date',
            'select'        => true,
            'min'           => 2,
            'max'           => 50
        ),

        array(

            'field_name'    => 'status',
            'name'          => 'Status',
            'select'        => true,
            'min'           => 1,
            'max'           => 1
        ),
        array(

            'field_name'    => 'description',
            'name'          => 'Description',
            'select'        => true,
            'min'           => 5,
            'max'           => 500
        )
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

          $insert = new Medicine;

          if($insert->addMedicine($medicine_name, $generic_name, $sku, $mg, $categories, $manufacturer, $price, $mprice, $stock, $expire_date, $status, $description)){

            $message = array("Successfully Added Medicine");

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

    if(isset($_POST['submit']) && $_POST['submit'] === 'Update Medicine'){
      $get_id         = $_POST['getID'];
      $medicine_name  = $_POST['medicine_name'];
      $generic_name   = $_POST['generic_name'];
      $sku            = $_POST['sku'];
      $mg             = $_POST['mg'];
      $categories     = $_POST['categories'];
      $manufacturer   = $_POST['manufacturer'];
      $price          = $_POST['price'];
      $mprice         = $_POST['mprice'];
      $stock          = $_POST['stock'];
      $expire_date    = $_POST['expire_date'];
      $status         = $_POST['status'];
      $description    = $_POST['description'];
      
      $form_data = array(
  
          array(
  
              'field_name'    => 'medicine_name',
              'name'          => 'Medicine Name',
              'required'      => true,
              'min'           => 4,
              'max'           => 50
          ),
  
          array(
  
              'field_name'    => 'generic_name',
              'name'          => 'Generic Name',
              'required'      => true,
              'min'           => 2,
              'max'           => 50
          ),
  
          array(
  
              'field_name'    => 'sku',
              'name'          => 'SKU',
              'select'        => true,
              'min'           => 2,
              'max'           => 20
          ),
  
          array(
  
              'field_name'    => 'mg',
              'name'          => 'MG',
              'required'      => true,
              'min'           => 2,
              'max'           => 20
          ),
  
          array(
            'field_name'    => 'categories',
            'name'          => 'Category',
            'required'      => true,
            'min'           => 2,
            'max'           => 20
          ),
  
          array(
  
            'field_name'    => 'manufacturer',
            'name'          => 'Manufacturer',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
          ),
  
          array(
  
            'field_name'    => 'price',
            'name'          => 'Price',
            'required'      => true,
            'min'           => 2,
            'max'           => 50
          ),
          
          array(
  
            'field_name'    => 'mprice',
            'name'          => 'Manufacturer Price',
            'select'        => true,
            'min'           => 2,
            'max'           => 50
          ),
  
          array(
  
              'field_name'    => 'stock',
              'name'          => 'Stock',
              'select'        => true,
              'min'           => 2,
              'max'           => 50
          ),
  
          array(
  
              'field_name'    => 'expire_date',
              'name'          => 'Expire Date',
              'select'        => true,
              'min'           => 2,
              'max'           => 50
          ),
  
          array(
  
              'field_name'    => 'status',
              'name'          => 'Status',
              'select'        => true,
              'min'           => 1,
              'max'           => 1
          ),
          array(
  
              'field_name'    => 'description',
              'name'          => 'Description',
              'select'        => true,
              'min'           => 5,
              'max'           => 500
          )
        );
  
        $validation = new Validation;
        $validation->validate($form_data);
  
        if($validation->hasErrorPassed){
  
            $update = new Medicine;

            $data   = array(

                'medicine_name',        '=', $medicine_name,
                'generic_name',         '=', $generic_name,
                'SKU',                  '=', $sku,
                'MG',                   '=', $mg,
                'category',             '=', $categories,
                'manufacturer',         '=', $manufacturer,
                'price',                '=', $price,
                'manufacturer_price',   '=', $mprice,
                'stock',                '=', $stock,
                'expire_date',          '=', $expire_date,
                'status',               '=', $status,
                'description',          '=', $description,
            );
              
            $where  = array(
                'id', '=', $get_id,
            );
  
            if($update->updateMedicine('medicine',$data,$where)){
  
              $message = array("Successfully Updated Medicine");
  
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