<?php
	
	require_once ('Database.php');

	class Purcahse extends Database{

		public $query, $error;

		public function addPurcahse($name, $manufacturer, $qnt, $uprice, $amount, $date, $categories, $notes){

			if($this->Insert('purcahse',['sname','manufacturer','qnt','uprice','amount','date','category','notes'],[$name, $manufacturer, $qnt, $uprice, $amount, $date, $categories, $notes])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getPurcahse($where = null){

			if($this->Select(['*'], 'purcahse', $where)){

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

		public function deletePurcahse($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>