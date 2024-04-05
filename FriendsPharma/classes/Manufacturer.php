<?php
	
	require_once ('Database.php');

	class Manufacturer extends Database{

		public $query, $error;

		public function addManufacturer($company, $email, $phone, $balance, $country, $city, $state, $status){

			if($this->Insert('manufacturer',['company_name','email','phone','balance','country','city','state','status'],[$company, $email, $phone, $balance, $country, $city, $state, $status])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getManufacturer($where = null){

			if($this->Select(['*'], 'manufacturer', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updateManufacturer($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deleteManufacturer($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>