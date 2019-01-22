<?php
require_once('../classes/classes.visitor.php');
$obj_visitors = new Visitor();

$id_tenant   = 1;//isset($_GET['id_qt']) ? $_GET['id_qt'] : 0;
$visitors		= $obj_visitors->getVisitorsOfTenant($id_tenant);

$result["visitors"] = $visitors;

echo json_encode($result);
?>