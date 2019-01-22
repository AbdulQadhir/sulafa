<?php
require_once('classes.database.php');
class Adv{
	public $link;

	//Status => 0  - Pending Approval
		//		1  - Approved
		//		-1 - Rejected
		//		2  - Sold Out
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getMyAdvs($id_tenant)
	{
		$_query = "SELECT * FROM adv where id_tenant=?";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant);
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function getMyAdvDt($id_adv)
	{
		$_query = "SELECT * FROM adv where id_adv=?";
		$query=$this->link->prepare($_query);
		$values=array($id_adv);
		$query->execute($values);
		return $query->fetchAll();
	}

	function getActiveAdvs()
	{
		$_query = "SELECT * FROM adv where status=1";
		$query=$this->link->prepare($_query);
		$values=array();
		$query->execute($values);
		return $query->fetchAll();
	}
	
	function addAdv($id_tenant,$title,$description,$price,$status)
	{
		$_query = "INSERT INTO adv (id_tenant,date,title,description,price,status) VALUES (?,CURDATE(),?,?,?,?)";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant,$title,$description,$price,$status);
		$query->execute($values);
		return $this->link->lastInsertId();
	}
	
	function updAdv($title,$description,$price,$id_adv)
	{
		$_query = "update adv set date=curdate(),title=?,description=?,price=?,status=0 where id_adv=?";
		$query=$this->link->prepare($_query);
		$values=array($title,$description,$price,$id_adv);
		$query->execute($values);
		return $this->link->lastInsertId();
	}
	
} 
/*
$obj= new Visitor();
echo json_encode($obj->getVisitors());
*/