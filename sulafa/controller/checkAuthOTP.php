<?php
require_once('../classes/classes.tenant.php');
$obj_auth = new Tenant();

$result = json_decode(file_get_contents('php://input'), true);

$phone = $result["phone"];
$otp = $result["otp"];

$auth = $obj_auth->AuthUserOTP($phone, $otp);

$result1["authentication"] = $auth;

echo json_encode($result1)
?>