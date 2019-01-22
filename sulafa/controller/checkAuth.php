<?php
require_once('../classes/classes.tenant.php');
$obj_auth = new Tenant();

$result = json_decode(file_get_contents('php://input'), true);

$phone = $result["phone"];

$auth		= $obj_auth->AuthUser($phone);

$result1["authentication"] = $auth;

echo json_encode($result1)
?>