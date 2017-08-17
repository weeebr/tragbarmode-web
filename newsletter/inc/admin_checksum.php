<?php

include("admin_checksum_check.php");
include("json_encode.php");

//will be executed first after ajax request
if(checksum_check($_POST['licence_domain'], $_POST['licence_serialnumber'], 3))
{
	$return_arr["checksum"] = "true";

	if(substr($_POST['licence_serialnumber'], 22, 1) <= 4)
		$return_arr["test"] = "without copyright";
	else
		$return_arr["test"] = "with copyright";

}
else
	$return_arr["checksum"] = "false";

	
echo json_encode($return_arr);

?>