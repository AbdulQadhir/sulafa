<?php
require_once('../../classes/classes.adv.php');
$obj_adv = new Adv();

$id_adv   = isset($_GET['id_adv']) ? $_GET['id_adv'] : 0;
$ads		= $obj_adv-> getMyAdvDt($id_adv)[0];

$result["ad"] = $ads;

echo json_encode($result);
?>