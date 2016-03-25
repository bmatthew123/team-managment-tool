<?php

require($_SERVER['DOCUMENT_ROOT'].'/includes/includeMeBlank.php');

$netID = getenv("SERVICE_NOW_USER");
$password = getenv("SERVICE_NOW_PASSWORD");

$query = $_REQUEST['query'];

$url = getenv("SERVICE_NOW_STAGE_URL")."/sys_user_list.do?WSDL";

if( $env == 2 ){
	$url = getenv("SERVICE_NOW_URL")."/sys_user_list.do?WSDL";
} 
$ServiceNowClient = new SoapClient($url, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_MEMORY, 'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP, 'login' => $netID, 'password' => $password));

$result = $ServiceNowClient->getRecords(array('__encoded_query'=>$query));

if(isset($result->getRecordsResult))
{
	if(is_array($result->getRecordsResult))
	{
		echo json_encode(array('status'=>'OK', 'data'=>$result->getRecordsResult));
	}
	else
	{
		echo json_encode(array('status'=>'OK', 'data'=>array($result->getRecordsResult)));
	}
}
else
{
	echo json_encode(array('status'=>'FAIL', 'error'=>'No records found.'));
}

?>
