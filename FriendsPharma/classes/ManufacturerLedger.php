<?php
	
	require_once ('Database.php');

	class ManufacturerLedger extends Database{

		public $query, $error;

		public function addLedger($invoice, $date, $manufacturer, $payment_term, $debit, $credit, $balance){

			if($this->Insert('manufacturer_ledger',['invoice_no','date','manufacturer','payment_term','debit','credit','balance'],[$invoice, $date, $manufacturer, $payment_term, $debit, $credit, $balance])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getLedger($where = null){

			if($this->Select(['*'], 'manufacturer_ledger', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		/*public function updatetournament($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}*/

		public function deleteLedger($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>