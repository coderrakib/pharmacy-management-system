<?php
    require_once ('../config.php');

    if(isset($_POST['submit']) && $_POST['submit'] === 'Login'){

        $phone      = $_POST['phone'];
        $password   = $_POST['password'];
                            
        $login      = new Login;
        $isLoged    = $login->userLogin($phone, $password);

        $messages   = [];

        if(isset($phone,$password)){

            if(empty($phone) && empty($password)){
                $messages[] = 'Phone Number & Password is Required';
            }else{
                if(empty($phone)){
                        $messages[] = 'Phone Number is Required';  
                    }elseif (empty($password)) {
                        $messages[] = 'Password is Required';
                    }elseif ($isLoged === false) {
                        $messages[] = 'Your Phone or Password is Incorrect';
                }   
            }

            if(!empty($messages)){

                $_SESSION['messages']   = $messages;
                $_SESSION['class_name'] = 'border-danger';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
				exit;

            }else{

                $messages[] = 'Successfully Login';

                $_SESSION['front_user'] = $phone;
                
                header('Location: ../dashboard.php');
				exit;
             }
        }
    }
                    
?>