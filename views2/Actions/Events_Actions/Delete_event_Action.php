<?php
	include "../../../Controllers/ConnectionController.php";
	
	$id_event = addslashes($_POST['id_event']);
	try
	{
		 // sql to delete a record
    $sql = "delete from evenement where id_event='$id_event'";

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