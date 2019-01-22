<?php
require_once('classes.database.php');
class Pass{
	public $link;
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getPassDetails($pass_hash)
	{
		$_query = "SELECT id_tenant as id, name, 'Tenant' as type, room_no FROM tenant where pass_hash=?
					union
				   SELECT id_visitor as id, v.name, 'Visitor' as type, room_no FROM visitor v, tenant t where v.id_tenant=t.id_tenant and v.pass_hash=?
		";
		$query=$this->link->prepare($_query);
		$values=array($pass_hash,$pass_hash);
		$query->execute($values);
		return $query->fetchAll();
	}
} 
$obj= new Pass();
echo json_encode($obj->getPassDetails("123456789"));