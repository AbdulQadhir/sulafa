<?php
require_once('classes.database.php');
class Tenant_Request{
	public $link;
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getTenants()
	{
		$_query = "SELECT * FROM tenant_request";
		$query=$this->link->prepare($_query);
		$values=array();
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function getTenantDt($id_tenant_request)
	{
		$_query = "SELECT * FROM tenant_request where id_tenant_request=?";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant_request);
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function regTenantRequest($name,$phone,$emirates_id,$flat_no)
	{
		$_query = "INSERT INTO tenant_request (name,phone,emirates_id,flat_no) VALUES (?,?,?,?)";
		$query=$this->link->prepare($_query);
		$values=array($name,$phone,$emirates_id,$flat_no);
		$query->execute($values);
		return $this->link->lastInsertId();
	}

} 
/*
$obj= new Tenant();
echo json_encode($obj->getTenantDt(1));
*/