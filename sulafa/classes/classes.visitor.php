<?php
require_once('classes.database.php');
class Visitor{
	public $link;
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getVisitorsOfTenant($id_tenant)
	{
		$_query = "SELECT *,DATE_FORMAT(date,'%d/%m/%Y') as _date  FROM visitor where id_tenant=?";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant);
		$query->execute($values);
		return $query->fetchAll();
	}

	function getVisitorDt($id_visitor)
	{
		$_query = "SELECT * FROM visitor where id_visitor=?";
		$query=$this->link->prepare($_query);
		$values=array($id_visitor);
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function addVisitor($name,$pass_hash,$gate_access,$valley_access,$id_tenant)
	{
		$_query = "INSERT INTO visitor (name,date,pass_hash,gate_access,valley_access,id_tenant) VALUES (?,now(),?,?,?,?)";
		$query=$this->link->prepare($_query);
		$values=array($name,$pass_hash,$gate_access,$valley_access,$id_tenant);
		$query->execute($values);
		return $this->link->lastInsertId();
	}
	
} 
/*
$obj= new Visitor();
echo json_encode($obj->getVisitors());
*/