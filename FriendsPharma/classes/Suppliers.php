<?php
	
	require_once ('Database.php');

	class Suppliers extends Database{

		public $query, $error;

		public function addSuppliers($name, $manufacturer, $email, $phone, $address){

			if($this->Insert('suppliers',['name','manufacturer','email','phone','address'],[$name, $manufacturer, $email, $phone, $address])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getSuppliers($where = null){

			if($this->Select(['*'], 'suppliers', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		/*public function updateManufacturer($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}*/

		public function deleteSupplier($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>