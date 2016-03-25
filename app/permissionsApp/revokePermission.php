<?php
	require('../includes/includeMeBlank.php');
	$grantee=$_GET['netID'];
	$index=$_GET['index'];
	$grantor=$netID;

	//Development Purposes:
	//if(true){
	if(checkPermission('permissions')) {
		$permissionsIndex=pullPermissionIndexByNameCurrentArea('permissions');
		if ($grantee == $grantor && $index == $permissionsIndex) {
			echo "You can not revoke the 'permissions' permission for your own account.";
		}
		else {
			$results=revokeUserPermissionByIndex($grantee,$index);
			if(!$results) {
				echo "There has been an error with revoking this permission from ".nameByNetID($grantee).".";
				echo " Please refresh your page and try again. If you continue to recieve this error, please contact a member of the development team.";
			}
		}
	}
	else {
		echo "You do not have permissions to revoke this permission from ".nameByNetID($grantee)." If you feel this is in error, please contact your supervisor.";
	}
	
?>
