<?php
require_once('../../classes/classes.adv.php');

$result = json_decode(file_get_contents('php://input'), true);

$obj_adv = new Adv();

$id_adv = $result["id_adv"];
$id_tenant = $result["id_tenant"];
$title = $result["title"];
$description = $result["description"];
$price = $result["price"];
$status = 0;

if($id_adv==0)
    $post_ad = $obj_adv->addAdv($id_tenant,$title,$description,$price,$status);
else
    $post_ad = $obj_adv->updAdv($title,$description,$price,$id_adv);

$result["post_ad"] = $post_ad;

echo json_encode($result);
?>
