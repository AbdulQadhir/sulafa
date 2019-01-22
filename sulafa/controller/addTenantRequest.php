<?php
require_once('../classes/classes.tenant_request.php');

$result = json_decode(file_get_contents('php://input'), true);

$obj_tenant = new Tenant_Request();

$name = $result["name"];
$emirates_id = $result["emirates_id"];
$phone = $result["phone"];
$flat_no = $result["flat_no"];

$add_tenant = $obj_tenant->regTenantRequest($name,$emirates_id,$phone,$flat_no);

$result1["add_tenant_request"] = $add_tenant;

echo json_encode($result1);
?>
