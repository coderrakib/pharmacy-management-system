<?php
	
	require_once ('Database.php');

	class Employee extends Database{

		public $query, $error;

		public function addEmployee($f_name, $l_name, $gender, $birthday, $phone, $otpPassword, $email, $address, $photo_new_name, $designation, $n_id_new_name, $certificate_new_name, $join_date, $biography, $status){

			if($this->Insert('employee',['f_name','l_name','gender','birthday','phone','password','email','address','photo','designation','national_id','certificates','joining_date','biography','status'],[$f_name, $l_name, $gender, $birthday, $phone, $otpPassword, $email, $address, $photo_new_name, $designation, $n_id_new_name, $certificate_new_name, $join_date, $biography, $status])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getEmployee($where = null){

			if($this->Select(['*'], 'employee', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updateEmployee($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deleteEmployee($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>