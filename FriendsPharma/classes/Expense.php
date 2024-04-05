<?php
	
	require_once ('Database.php');

	class Expense extends Database{

		public $query, $error;

		public function addExpense($invoice_id, $category, $date, $amount){

			if($this->Insert('expense',['invoice_id','category','date','amount'],[$invoice_id, $category, $date, $amount])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getExpense($where = null){

			if($this->Select(['*'], 'expense', $where)){

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

		public function deleteExpense($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>