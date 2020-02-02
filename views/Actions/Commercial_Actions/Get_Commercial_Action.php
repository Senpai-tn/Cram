<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Commercial.php';
	
	$code = $_POST["code"];

	try{
		$stmt = $conn->prepare("select * FROM commercial where code = $code");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$commercial = new Commercial(
							    	$row['code'],$row['nom'] ,$row['email'] ,$row['telephone'] ,$row['departement'] ,$row['poste'] ,$row['num_serie']	
	    							);
	    	
	    	
	    	
		}

}
catch(PDOException $e) {
    $commercial=null;
}

$msg = array("success"=>$commercial);
echo json_encode($msg);

?>