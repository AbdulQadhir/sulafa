<?php
require_once('../classes/classes.visitor.php');

$result = json_decode(file_get_contents('php://input'), true);

$obj_visitors = new Visitor();

$id_tenant = $result["id_tenant"];
$name = $result["name"];
$pass_hash = $result["pass_hash"];
$gate_access = $result["gate_access"];
$valley_access = $result["valley_access"];

$add_visitor = $obj_visitors->addVisitor($name,$pass_hash,$gate_access,$valley_access,$id_tenant);

$result1["add_visitor"] = $add_visitor;

echo json_encode($result1);
?>
