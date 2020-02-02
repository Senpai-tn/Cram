<?php
	include "../../../Controllers/ConnectionController.php";
	
	
	

	try{
		$stmt = $conn->prepare("select count(*) as C FROM information");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	
	    	$count = $row['C'];
	    	
	    	
		}

}
catch(PDOException $e) {
    $count=null;
}

$msg = array("success"=>$count);
echo json_encode($msg);

?>