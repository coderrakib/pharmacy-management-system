<?php
	
	require_once ('Database.php');

	class OrderBy extends Database{

		public $query, $error;

		public function OrderBy($where = null,$orderbycol,$orderbyvalue){

			if($this->OrderBySelect(['*'],'invoice', $where,$orderbycol,$orderbyvalue)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>