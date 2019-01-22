<?php
require_once('classes.database.php');
class Tenant{
	public $link;
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getTenants()
	{
		$_query = "SELECT * FROM tenant";
		$query=$this->link->prepare($_query);
		$values=array();
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function getTenantDt($id_tenant)
	{
		$_query = "SELECT * FROM tenant where id_tenant=?";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant);
		$query->execute($values);
		return $query->fetchAll();
	}

	function AuthUser($phone)
	{
		$_query = "SELECT * FROM tenant where phone=?";
		$query = $this->link->prepare($_query);
		$values = array($phone);
		$query->execute($values);

		if($query->RowCount() > 0)
		{
			$otp = rand(1000, 9999);
			$this->updOTP($phone,$otp);
			return 1;
		}
		else
		{
			if($this->checkInRequest($phone))
				return -1;
			else
				return 0;
		}
	}
	
	function checkInRequest($phone)
	{
		$_query = "SELECT * FROM tenant_request where phone=?";
		$query = $this->link->prepare($_query);
		$values = array($phone);
		$query->execute($values);

		return $query->RowCount() > 0;
	}
	
	function AuthUserOTP($phone,$otp)
	{
		$_query = "SELECT * FROM tenant where phone=? and otp=?";
		$query = $this->link->prepare($_query);
		$values = array($phone,$otp);
		$query->execute($values);

		return $query->RowCount() > 0;
	}
	
	function updOTP($phone,$otp)
	{
		$_query = "update tenant set otp=?  where phone=?";
		$query=$this->link->prepare($_query);
		$values=array($otp, $phone);
		$query->execute($values);
		return $this->link->lastInsertId();
	}

} 
/*
$obj= new Tenant();
echo json_encode($obj->getTenantDt(1));
*/