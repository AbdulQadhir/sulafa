<?php
require_once('../../classes/classes.adv.php');
$obj_adv = new Adv();

$id_tenant   = isset($_GET['id_tenant']) ? $_GET['id_tenant'] : 0;
$ads		= $obj_adv-> getMyAdvs($id_tenant);

$result["ads"] = $ads;

echo json_encode($result);
?>