<?php
	include "../../../Controllers/ConnectionController.php";
	
	
	

	try{
		$stmt = $conn->prepare("sELECT Count(*) as C FROM `relation_information_prestataire` WHERE valide=1");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	
	    	$countValide = $row['C'];	
		}

		$stmt = $conn->prepare("sELECT Count(*) as C FROM `relation_information_prestataire` WHERE valide=0");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	
	    	$countInvalide = $row['C'];	
		}

}
catch(PDOException $e) {
    
}

$msg = array("success"=>array('valide'=>$countValide,'invalide'=>$countInvalide));
echo json_encode($msg);

?>