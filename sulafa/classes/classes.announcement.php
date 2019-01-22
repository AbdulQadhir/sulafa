<?php
require_once('classes.database.php');
class Announcement{
	public $link;
	
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;			
	}
	
	function getAnnouncementsOfTenant($id_tenant)
	{
		$_query = "SELECT *,DATE_FORMAT(date,'%d/%m/%Y') as _date  FROM announcement  WHERE id_announcement NOT IN (SELECT id_announcement FROM tenant_announcement WHERE STATUS=1 AND id_tenant=?)";
		$query=$this->link->prepare($_query);
		$values=array($id_tenant);
		$query->execute($values);
		return $query->fetchAll();
	}

} 
/*
$obj= new Visitor();
echo json_encode($obj->getVisitors());
*/