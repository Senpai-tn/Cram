<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Information.php';
	
	$n_sequence = $_POST["n_sequence"];

	try{
		$stmt = $conn->prepare("select * FROM information where n_sequence = '$n_sequence'  ");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$moyen = new Information(
				$row['date_facture'],
				$row['code'],
				$row['id_event'],
				$row['adresse'],
				$row['code_postal'],
				$row['ville'],
				$row['commentaire'],
				//$row['valid'],
				$row['n_sequence']
	    	);
	    	
	    	$list=$moyen;
	    	
	    	
		}

}
catch(PDOException $e) {
    $list=null;
}

$msg = array("success"=>$list);
echo json_encode($msg);

?>