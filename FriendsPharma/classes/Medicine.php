<?php
	
	require_once ('Database.php');

	class Medicine extends Database{

		public $query, $error;

		public function addMedicine($medicine_name, $generic_name, $sku, $mg, $categories, $manufacturer, $price, $mprice, $stock, $expire_date, $status, $description){

			if($this->Insert('medicine',['medicine_name','generic_name','SKU','MG','category','manufacturer','price','manufacturer_price','stock','expire_date','status','description'],[$medicine_name, $generic_name, $sku, $mg, $categories, $manufacturer, $price, $mprice, $stock, $expire_date, $status, $description])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getMedicine($where = null){

			if($this->Select(['*'], 'medicine', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updateMedicine($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deleteMedicine($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>