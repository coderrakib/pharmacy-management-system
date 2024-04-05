<?php
	
	require_once ('Database.php');

	class Invoice extends Database{

		public $query, $error;

		public function addInvoice($invoiceNo, $issueDate, $dueDate, $paymentType, $customerName, $address, $phone, $email, $medicineImp, $qntImp, $priceImp, $totalImp, $sub_total, $tax, $tax_amount, $total_amount){

			if($this->Insert('invoice',['invoice_no','date_issue','date_due','payment_type','customer_name','address','phone','email','medicine','qnt','price','total','sub_total','tax','tax_amount','grand_total'],[$invoiceNo, $issueDate, $dueDate, $paymentType, $customerName, $address, $phone, $email, $medicineImp, $qntImp, $priceImp, $totalImp, $sub_total, $tax, $tax_amount, $total_amount])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getInvoice($where = null){

			if($this->Select(['*'], 'invoice', $where)){

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

		/*public function deleteExpense($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}*/
	}
?>