<?php
require_once('../classes/classes.visitor.php');
$obj_visitors = new Visitor();

$id_visitor   = isset($_GET['id_visitor']) ? $_GET['id_visitor'] : 0;
$visitors		= $obj_visitors->getVisitorDt($id_visitor)[0];

$result["visitor"] = $visitors;

echo json_encode($result);
?>