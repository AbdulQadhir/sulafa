<?php
require_once('../classes/classes.tenant.php');
$obj_tenant = new Tenant();

$id_tenant   = 1;//isset($_GET['id_qt']) ? $_GET['id_qt'] : 0;
$tenant		= $obj_tenant->getTenantDt($id_tenant)[0];

$result["tenant"] = $tenant;

echo json_encode($result);
?>