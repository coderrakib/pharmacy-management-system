<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Save Invoice'){
    $invoiceNo      = $_POST['invoiceNo'];
    $issueDate      = $_POST['issueDate'];
    $dueDate        = $_POST['dueDate'];
    $paymentType    = $_POST['paymentType'];
    $customerName   = $_POST['customerName'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $medicine       = $_POST['medicine'];
    $qty            = $_POST['qty'];
    $price          = $_POST['price'];
    $total          = $_POST['total'];
    $sub_total      = $_POST['sub_total'];
    $tax            = $_POST['tax'];
    $tax_amount     = $_POST['tax_amount'];
    $total_amount   = $_POST['total_amount'];

    $form_data = array(

        array(

            'field_name'    => 'paymentType',
            'name'          => 'Payment Type',
            'required'      => true,
            'min'           => 1,
            'max'           => 50
        )
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

        $medicineImp    = implode(',', $medicine);
        $qntImp 	    = implode(',', $qty);
        $priceImp       = implode(',', $price);
        $totalImp 	    = implode(',', $total);

        $messages   = array();

            if(isset($medicine,$qty,$price)){

                if(empty($medicine) && empty($qty) && empty($price)){
                    $messages = array('Medicine & Quantity & Price is Required');
                }else{
                    if(empty($medicine)){
                            $messages = array('Medicine is Required');  
                        }elseif (empty($qty)) {
                            $messages = array('Quantity is Required'); 
                        }elseif (empty($price)) {
                            $messages = array('Price is Required');
                    }   
                }

                if(!empty($messages)){

                    $_SESSION['messages']   = $messages;
                    $_SESSION['class_name'] = 'border-danger';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;

                }else{
                    
                    $insert = new Invoice;

                    if($insert->addInvoice($invoiceNo, $issueDate, $dueDate, $paymentType, $customerName, $address, $phone, $email, $medicineImp, $qntImp, $priceImp, $totalImp, $sub_total, $tax, $tax_amount, $total_amount)){

                        $message = array("Successfully Added Invoice");

                        $_SESSION['messages']   = $message;
                        $_SESSION['class_name'] = 'border-success';

                        header('Location: ../invoice-list.php');
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
    } 
}
?>