<?php
	include "../../../Controllers/ConnectionController.php";
	
	$code = addslashes($_POST['code']);
	try
	{
		 // sql to delete a record
    $sql = "delete from commercial where code='$code'";

    // use exec() because no results are returned
    $conn->exec($sql);
    $result =  "success";
    
	}
	catch(PDOException $e)
	{
		$result =$e;
	}

	$msg = array("success"=>$result);
	echo json_encode($msg);

?>