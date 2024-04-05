<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $employee = new Employee;
    $employee->getEmployee(['id', '=', $id]);
    $query = $employee->query;

    $result = $query->fetch_assoc();
    $db_image   = $result['photo'];
    $db_nid     = $result['national_id'];
    $db_cre     = $result['certificates'];

    if($employee->deleteEmployee('employee', $id)){

    	if(isset($db_image)){                              
           	$path = "files/photo/$db_image";
            unlink($path); 
        }
        if(isset($db_nid)){                                
            $path = "files/NID/$db_nid";
            unlink($path); 
        }
        if(isset($db_cre)){                                
            $path = "files/certificates/$db_cre";
            unlink($path); 
        }

        $message = array("Successfully Deleted Employee");

        $_SESSION['messages']   = $message;
        $_SESSION['class_name'] = 'border-success';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
    }
?>