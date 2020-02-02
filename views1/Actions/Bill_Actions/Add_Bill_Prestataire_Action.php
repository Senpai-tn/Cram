
<?php 
include "../../../Controllers/ConnectionController.php";
$num_serie=addslashes($_POST['num_serie']);
if(isset($_POST['listID']))
$listID = $_POST['listID'];
else $listID = "";

if(isset($_POST['montant']))
$montant=floatval($_POST['montant']);

if(isset($_POST['p2']))
$p2=floatval($_POST['p2']);

if(isset($_POST['q2']))
$q2=floatval($_POST['q2']);


if(isset($_POST['retrocession']))
$retrocession=floatval($_POST['retrocession']);


if(isset($_POST['billnumber']))
	$billnumber=addslashes($_POST['billnumber']);
else 
	$billnumber = NULL;

if(isset($_POST['date_facture']))
	{
		$date_facture = new DateTime($_POST['date_facture'].'-01');
	}
else 
	$date_facture = new DateTime();


try {
		if(isset($_POST['id']))
		{
		 	$id = explode(",",$_POST['id']);

		 	for ($i=0; $i < sizeof($id) ; $i++) 
		 	{ 
				$sql = "update relation_information_correspondant set valide = 0 where n_sequence ='".$id[$i]."'";
		    	// Prepare statement
		    	$stmt = $conn->prepare($sql);
		    	// execute the query
		    	$stmt->execute();
		    }
		}

		$listID = explode( ",", $listID );
		for ($i=0; $i < sizeof($listID) ; $i++) 
		 	{ 
				$sql = "update relation_information_prestataire set payee = 1 where id='".$listID[$i]."'";
		    	// Prepare statement
		    	$stmt = $conn->prepare($sql);
		    	// execute the query
		    	$stmt->execute();
		    }

		$sql = "update `prestataire` SET `nbr_signalement_payee` = `nbr_signalement_payee`+".$q2." WHERE num_serie='".$num_serie."'";
    	// Prepare statement
    	$stmt = $conn->prepare($sql);
    	// execute the query
    	$stmt->execute();
	
	
		
		$sql = "insert INTO `facture_client` (`num_facture`, `num_serie`, `montant`, `date_facture`,retrocession,nbr_Signalement,paye) VALUES (
		'$billnumber',
		'".$num_serie."', 
		'".$montant."', 
		'".$date_facture->format('Y-m-d H:m:i')."',
		'".$retrocession."',
		'".$q2."',
		'".$p2."'
		);";
					 	
	        // use exec() because no results are returned
	        $conn->exec($sql); 
	        $result =  "success";

	
} catch (Exception $e) {
	$result =  $e->getMessage();
}

	
        
    $msg= array("success"=>$result);
    echo json_encode($msg);
?>