<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Correspondant.php';
	
	$code = $_POST["code"];

	try{
		$stmt = $conn->prepare("select * FROM correspondant where code = $code");
	    $stmt->execute();
	    $i = 0;
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$moyen = new Correspondant(
							    		$row["code"],
							    		$row["nom"],
							    		$row["adresse"],
							    		$row["code_postal"],
							    		$row["email"],
							    		$row["telephone"],
							    		$row["etat"],
							    		$row["prix"],
							    		$row["ville"]
	    							);
	    	
	    	$list[$i]=$moyen;
	    	$i++;
	    	
		}

}
catch(PDOException $e) {
    $list=null;
}

$msg = array("success"=>$list);
echo json_encode($msg);

?>