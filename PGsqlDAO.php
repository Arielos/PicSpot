<?php 
	class PGsqlDAO
	{
		private $dbname ='dc1672b9586skj';									//Name of the database
		private $dbuser ='cjpuplxhiyanhv';									//Username for the db
		private $dbpass ='3190Aj5LPHYNDkhedIgjoAQF29';						//Password for the db
		private $dbserver ='ec2-23-21-231-14.compute-1.amazonaws.com';		//Name of the pgsql server
		private $dbcnx;
		
		private function __construct()
		{
			$this->connect();
		}
		
		public static function getInstance()
		{
			static $instance = null;
			if($instance === null) {
				$instance = new PGsqlDAO();
			}
			return $instance;
		}
		
		public function connect()
		{
			if($this->isConnected() == false)
			{
				$this->dbcnx = pg_connect("host=" . $this->dbserver . " port=5432 dbname=" . $this->dbname . " user=" . $this->dbuser ." password=" . $this->dbpass);
			}
			return $this->isConnected();
		}
		
		public function isConnected()
		{
			$stat = pg_connection_status($this->dbcnx);
			return ($stat === PGSQL_CONNECTION_OK);    
		}
		
		public function insert($tableName, $ascArr)
		{
			$result = pg_insert($this->dbcnx, $tableName, $ascArr);
			return ($result != null);
		}
		
		public function update($tableName, $ascArr)
		{
			$result = pg_update($this->dbcnx, $tableName, $ascArr);
			return ($result != null);
		}
		
		public function select($tableName, $ascArr)
		{
			$result = pg_select($this->dbcnx, $tableName, $ascArr);
			return $result;
		}
		
		/* DISABLED FOR NOW */
		/*public function delete($tableName, $ascArr)
		{
			$result = pg_update($this->dbcnx, $tableName, $ascArr);
			return ($result != null);
		}*/
	}
	
	//$instance = PGsqlDAO::getInstance();
	/*
	$instance->insert("user", array(
				'username'=>"user4",
				'first_name'=>"ittai",
				'last_name'=>"yam",
				'hashed_password'=>pg_unescape_bytea("2222"),
				'email_address'=>"iy4@gmail.com"));
	*/
	/*
	$records = $instance->select("user", array('first_name'=>"ittai"));
	foreach($records as $curr){
		echo $curr['id']." ".$curr['username']."<br>";
	}
	*/
?>
