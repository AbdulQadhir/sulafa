<?php
require_once('../classes/classes.maintenance.php');
$obj_maintenance = new Maintenance();

$result = json_decode(file_get_contents('php://input'), true);

$id_tenant = $_GET["id_tenant"];
$type = $result["service_type"];
$description = $result["description"];
$date_available = explode("T",$result["date"])[0];
$time_available = "";

$req_maintenance = $obj_maintenance->reqMaintenance($type,$description,$date_available,$time_available,$id_tenant);

$result1["req_maintenance"] = $req_maintenance;

echo json_encode($result1);
?>