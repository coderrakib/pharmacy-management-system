<?php
	
	require_once ('Database.php');

	class Login extends Database{

		public $query;

		public function userLogin($phone, $password){

			if($this->Select(['*'], 'employee', ['phone', '=', $phone, 'password', '=',
			$password, 'status', '=', 1])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public static function isLoged(){

			if(!isset($_SESSION['front_user']) && $_SESSION['front_user'] == ''){
				return false;
			}
			return true;
		}	
	} 
?>