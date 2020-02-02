<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Information.php';
	


	try{
		$stmt = $conn->prepare("select * FROM `information` order by created_at DESC limit 1");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$result =	$row['n_sequence'];

		}

}
catch(PDOException $e) {
    $result=null;
}

$msg = array("success"=>$result);
echo json_encode($msg);

?>