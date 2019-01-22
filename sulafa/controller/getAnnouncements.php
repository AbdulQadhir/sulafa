<?php
require_once('../classes/classes.announcement.php');
$obj_announcement = new Announcement();

$id_tenant   = 1;//isset($_GET['id_qt']) ? $_GET['id_qt'] : 0;
$announcements		= $obj_announcement->getAnnouncementsOfTenant($id_tenant);

$result["announcements"] = $announcements;

echo json_encode($result);
?>