<?php 

require_once ('../config.php');

$get_URL = htmlspecialchars($_GET["action"]);

if( $get_URL == "insert"){

  if(isset($_POST['submit']) && $_POST['submit'] === 'Add Employee'){
    $f_name         = ucwords($_POST['f_name']);
    $l_name         = $_POST['l_name'];
    $gender         = $_POST['gender'];
    $birthday       = $_POST['birthday'];
    $phone          = $_POST['phone'];
    $otpPassword    = rand(1111,9999);
    $email          = $_POST['email'];
    $address        = $_POST['address'];

    $photo          = $_FILES['photo']['name'];
    $photo_tmp      = $_FILES['photo']['tmp_name'];

    $designation    = $_POST['designation'];

    $n_id           = $_FILES['n_id']['name'];
    $n_id_tmp       = $_FILES['n_id']['tmp_name'];

    $certificates       = $_FILES['certificates']['name'];
    $certificates_tmp   = $_FILES['certificates']['tmp_name'];

    $join_date      = $_POST['join_date'];
    $status         = $_POST['status'];
    $biography      = $_POST['biography'];
        
    $photo_directory          = '../files/photo/';
    $n_id_directory           = '../files/NID/';
    $certificates_directory   = '../files/certificates/';
                        
    $form_data = array(

        array(

            'field_name'    => 'f_name',
            'name'          => 'First Name',
            'required'      => true,
            'min'           => 5,
            'max'           => 20
        ),

        array(

            'field_name'    => 'l_name',
            'name'          => 'Last Name',
            'required'      => true,
            'min'           => 2,
            'max'           => 20
        ),
        array(

            'field_name'    => 'gender',
            'name'          => 'Gender',
            'select'        => true,
            'min'           => 2,
            'max'           => 6
        ),
        array(

            'field_name'    => 'birthday',
            'name'          => 'Birthday',
            'required'      => true,
            'min'           => 5,
            'max'           => 20
        ),
        array(
          'field_name'    => 'phone',
          'name'          => 'Phone',
          'required'      => true,
          'min'           => 11,
          'max'           => 11,
          'unique'        => true,
          'table'         => 'employee',
          'column'        => 'phone'
        ),
        array(

          'field_name'    => 'email',
          'name'          => 'Email',
          'required'      => true,
          'min'           => 2,
          'max'           => 50,
          'unique'        => true,
          'table'         => 'employee',
          'column'        => 'email'
        ),
        array(

          'field_name'    => 'address',
          'name'          => 'Address',
          'required'      => true,
          'min'           => 5,
          'max'           => 100
        ),
        array(

          'field_name'    => 'photo',
          'name'          => 'Photo',
          'type'          => 'file',
          'required'      => true
        ),
        array(

          'field_name'    => 'designation',
          'name'          => 'Designation',
          'select'        => true,
          'min'           => 5,
          'max'           => 20
        ),
        array(

          'field_name'    => 'n_id',
          'name'          => 'NID',
          'type'          => 'file',
          'required'      => true
        ),
        array(

          'field_name'    => 'certificates',
          'name'          => 'Certificates',
          'type'          => 'file',
          'required'      => true
        ),
        array(

          'field_name'    => 'join_date',
          'name'          => 'Join Date',
          'required'      => true,
          'min'           => 5,
          'max'           => 20
        ),
        array(

          'field_name'    => 'status',
          'name'          => 'Status',
          'select'        => true,
          'min'           => 1,
          'max'           => 1
        ),
        array(

          'field_name'    => 'biography',
          'name'          => 'Biography',
          'required'      => true,
          'min'           => 5,
          'max'           => 100
        ),
      );

      $validation = new Validation;
      $validation->validate($form_data);

      if($validation->hasErrorPassed){

        $explode_photo    = explode('.', $photo);
        $extension_photo  = end($explode_photo);
        $photo_new_name   = rand(1000, 99999).'.'.$extension_photo;

        $explode_n_id    = explode('.', $n_id);
        $extension_n_id  = end($explode_n_id);
        $n_id_new_name   = rand(1000, 99999).'.'.$extension_n_id;

        $explode_certificates    = explode('.', $certificates);
        $extension_certificates  = end($explode_certificates);
        $certificate_new_name    = rand(1000, 99999).'.'.$extension_certificates;

          $insert = new Employee;

          if($insert->addEmployee($f_name, $l_name, $gender, $birthday, $phone, $otpPassword, $email, $address, $photo_new_name, $designation, $n_id_new_name, $certificate_new_name, $join_date, $biography, $status)){

            $url = "http://bulksmsbd.net/api/smsapi";
            $api_key = "dd8vmi6wOjUXsMQGnrhc";
            $senderid = "8809617613555";
            $number = "$phone";
            $message = "Dear Friends Pharma employee, your login password is $otpPassword";
                
            $data = [
                "api_key" => $api_key,
                "senderid" => $senderid,
                "number" => $number,
                "message" => $message
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);

            if ($err){
              echo "cURL Error #:" . $err;
            }else{
              $data = json_decode($response);
            }
            
            move_uploaded_file($photo_tmp, $photo_directory.$photo_new_name);
            move_uploaded_file($n_id_tmp, $n_id_directory.$n_id_new_name);
            move_uploaded_file($certificates_tmp, $certificates_directory.$certificate_new_name);

            $message = array("Successfully Added Employee. I was send password in employee phone number");

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
  if(isset($_POST['submit']) && $_POST['submit'] === 'Save Changes'){

    $userID         = $_POST['userID'];
    $db_image       = $_POST['dbImage'];
    $photo          = $_FILES['photo']['name'];
    $photo_tmp      = $_FILES['photo']['tmp_name'];

    $f_name         = ucwords($_POST['f_name']);
    $l_name         = $_POST['l_name'];
    $biography      = $_POST['biography'];
    $birthday       = $_POST['birthday'];
    $email          = $_POST['email'];
    $address        = $_POST['address'];

    $photo_directory  = '../files/photo/';

    $form_data = array(

      array(

          'field_name'    => 'f_name',
          'name'          => 'First Name',
          'required'      => true,
          'min'           => 5,
          'max'           => 20
      ),

      array(

          'field_name'    => 'l_name',
          'name'          => 'Last Name',
          'required'      => true,
          'min'           => 2,
          'max'           => 20
      ),
      array(

          'field_name'    => 'birthday',
          'name'          => 'Birthday',
          'required'      => true,
          'min'           => 5,
          'max'           => 20
      ),
      array(
        'field_name'    => 'email',
        'name'          => 'Email',
        'required'      => true,
        'min'           => 2,
        'max'           => 50
      ),
      array(
        'field_name'    => 'address',
        'name'          => 'Address',
        'required'      => true,
        'min'           => 5,
        'max'           => 100
      ),
      array(

        'field_name'    => 'photo',
        'name'          => 'Photo',
        'type'          => 'file',
        'required'      => true
      ),
      array(

        'field_name'    => 'biography',
        'name'          => 'Biography',
        'required'      => true,
        'min'           => 5,
        'max'           => 100
      ),
    );

    $validation = new Validation;
    $validation->validate($form_data);

    if($validation->hasErrorPassed){

        $explode    = explode('.', $photo);
        $extension  = end($explode);

        $update = new Employee;

        $data   = array(

          'f_name',       '=', $f_name,
          'l_name',       '=', $l_name,
          'birthday',     '=', $birthday,
          'biography',    '=', $biography,
          'email',        '=', $email,
          'address',      '=', $address,
        );

        if(!empty($photo)){

          $new_name   = rand(1000, 99999).'.'.$extension;
          $data[]     = 'photo';
          $data[]     = '=';
          $data[]     = $new_name;
        }

        $where  = array(
          'id', '=', $userID,
        );

        if($update->updateEmployee('employee',$data,$where)){

          $message = array("Successfully Employee Update");

          $_SESSION['messages']   = $message;
          $_SESSION['class_name'] = 'border-success';

          if(!empty($photo)){
            if(isset($photo)){
              $path = "../files/photo/$db_image";
              unlink($path); 
            }
            move_uploaded_file($photo_tmp, $photo_directory.$new_name);
          }
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
if( $get_URL == "updatePassword"){
  if(isset($_POST['changePass']) && $_POST['changePass'] === 'Change Password'){
    $userID         = $_POST['userID'];
    $oldPass        = $_POST['oldPass'];
    $password       = $_POST['password'];
    $newpassword    = $_POST['newpassword'];
    $renewpassword  = $_POST['renewpassword'];

    $form_data = array(

      array(

          'field_name'    => 'password',
          'name'          => 'Current Password',
          'required'      => true,
          'min'           => 4,
          'max'           => 20
      ),
      array(

          'field_name'    => 'newpassword',
          'name'          => 'New Password',
          'required'      => true,
          'min'           => 2,
          'max'           => 20,
          'matching'      => $newpassword
      ),
      array(
          'field_name'    => 'renewpassword',
          'name'          => 'Re-New Password',
          'required'      => true,
          'min'           => 2,
          'max'           => 20,
          'matching'      => $newpassword
      ),
    );

    $validation = new Validation;
    $validation->validate($form_data);
    if($validation->hasErrorPassed){

      $messages   = [];

      if($oldPass != $password){
        $messages[] = 'Current Password Incorrect!';
      }else{

        $update = new Employee;

        $data   = array(
          'password',  '=', $newpassword,
        );

        $where  = array(
          'id', '=', $userID,
        );

        $update->updateEmployee('employee',$data,$where);
      }

      if(!empty($messages)){
        $_SESSION['messages']   = $messages;
        $_SESSION['class_name'] = 'border-danger';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
      }else{
          $messages = array('Successfully Password Changed');
          $_SESSION['messages']   = $messages;
          $_SESSION['class_name'] = 'border-success';
          header('Location: ' . $_SERVER['HTTP_REFERER']);
				  exit;
      }
    }
  }
}
if( $get_URL == "updateDesignation"){
  if(isset($_POST['updateDeg']) && $_POST['updateDeg'] === 'Add Selected'){

    $memberID       = $_POST['member'];
    $designation    = $_POST['designation'];
    
    $form_data = array(

      array(
        'field_name'    => 'member',
        'name'          => 'Member',
        'required'      => true,
        'min'           => 1,
        'max'           => 20
      ),
      array(
        'field_name'    => 'designation',
        'name'          => 'Designation',
        'required'      => true,
        'min'           => 2,
        'max'           => 20
      ),
    );

    $validation = new Validation;
    $validation->validate($form_data);
    if($validation->hasErrorPassed){

      $update = new Employee;

      $data   = array(
        'designation',  '=', $designation,
      );

      $where  = array(
        'id', '=', $memberID,
      );

      if($update->updateEmployee('employee',$data,$where)){

        $message = array("Successfully Update Employee Designation");

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