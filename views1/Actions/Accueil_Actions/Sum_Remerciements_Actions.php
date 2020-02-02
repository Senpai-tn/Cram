<?php
	include "../../../Controllers/ConnectionController.php";
	
	
	

	try{
		$stmt = $conn->prepare("select SUM(montant) as C from facture_correspondant");
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