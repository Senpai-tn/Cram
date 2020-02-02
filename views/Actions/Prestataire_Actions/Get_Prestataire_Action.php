<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Prestataire.php';
	
	$num_serie = $_POST["num_serie"];

	try{
		
		$stmt = $conn->prepare("select *,GROUP_CONCAT(DISTINCT D.departement) as dep FROM prestataire as P , departement as D where P.num_serie = D.num_serie and P.num_serie = $num_serie");
	    $stmt->execute();
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$prestataire = new Prestataire($row['num_serie'],$row['raison_sociale'],$row['adresse'],$row['code_postal'],$row['abonnement'],$row['telephone'],$row['etat'],$row['commentaire'],$row['code_moyen'],$row['honoraire'],$row['dep'],$row['ville'],$row['street_number']);
    	
		}


}
catch(PDOException $e) {
    $prestataire=null;
}

$msg = array("success"=>$prestataire);
echo json_encode($msg);

?>