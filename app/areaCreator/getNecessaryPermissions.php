<?php
require_once("../includes/includeMeBlank.php");

	if (isset($_POST['appId']) && isset($_POST['areaId']))
	{
		// Get any permissions that the area does not already have but that are needed for the app
		try {
			$permissionQuery = $db->prepare("SELECT * FROM `permission` WHERE `permissionId` IN (SELECT `permissionId` FROM `appPermission` WHERE `appId` = :app) 
											 AND `permissionId` NOT IN (SELECT `permissionId` FROM `permissionArea` WHERE `area` IN (:area) ) ORDER BY `shortName`");
			$success = $permissionQuery->execute(array(':app' => $_POST['appId'], ':area' => $_POST['areaId']));
		} catch(PDOException $e) {
			$success = false;
		}

		if ($success)
		{
			$permissions = array();
			while ($permission = $permissionQuery->fetch(PDO::FETCH_ASSOC))
			{
				$permissions[] = $permission;
			}
			echo json_encode(array('status'=>"OK", 'query'=>'', 'permissions'=>$permissions));
		}
		else
		{
			echo json_encode(array('status'=>"FAIL", 'query'=>'', 'error'=>"error in query"));
		}
	}
?>