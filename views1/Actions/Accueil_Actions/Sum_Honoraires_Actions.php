<?php
	include "../../../Controllers/ConnectionController.php";
	
	
	

	try{
		$stmt = $conn->prepare("select (SUM(montant)*1.2) as C from facture_client");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	
	    	$count = $row['C'];
			$count = number_format($row['C'], 2);
	    	
	    	
		}

}
catch(PDOException $e) {
    $count=null;
}

$msg = array("success"=>$count);
echo json_encode($msg);

?>