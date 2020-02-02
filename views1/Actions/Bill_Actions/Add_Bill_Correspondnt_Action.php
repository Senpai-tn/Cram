
<?php 
include "../../../Controllers/ConnectionController.php";

$code=$_POST['code'];

if(isset($_POST['p2']))
$p2=floatval($_POST['p2']);

if(isset($_POST['q2']))
$q2=floatval($_POST['q2']);


if(isset($_POST['billnumber']))
	$billnumber=addslashes($_POST['billnumber']);
else 
	$billnumber = NULL;


if(isset($_POST['bonus']))
$bonus = floatval($_POST['bonus']);

if(isset($_POST['begin_date']))
$begin_date = new DateTime($_POST['begin_date']);

if(isset($_POST['end_date']))
$end_date = new DateTime($_POST['end_date']);


if(isset($_POST['date_facture']))
	{
		$date_facture = new DateTime($_POST['date_facture']);
	}
else 
	$date_facture = new DateTime();



try {
	if(isset($_POST['id']))
	{
		
	 	$id = explode(",",$_POST['id']);
	 	for ($i=0; $i < sizeof($id) ; $i++) 
	 	{ 
			$sql = "update `relation_information_correspondant` SET `paye`= 1 WHERE id = '".$id[$i]."'";

	    	// Prepare statement
	    	$stmt = $conn->prepare($sql);

	    	// execute the query
	    	$stmt->execute();
	    }
	}
	if(isset($_POST['p2']))
	{
		$montant = (float)(($p2*$q2)+($bonus));
		//$montant = (float)($montant * (float)(120 /100)); 
		$sql = "insert INTO `facture_correspondant` (num_facture,`code`, `montant`, `date_facture`, `paye`,  `nbr_Signalement`, `p_Signalement`, `bonus`,begin_date,end_date ) 
		 	VALUES (
		 				'$billnumber',
					 	".$code.", 
					 	".$montant.", 
					 	'".$date_facture->format('Y-m-d H:i:s')."', 
					 	1,
					 	".$q2.", 
					 	".$p2.", 
					 	
					 	".$bonus.",
					 	'".$begin_date->format('Y-m-d H:i:s')."',
					 	'".$end_date->format('Y-m-d H:i:s')."'
		 			);";
	        // use exec() because no results are returned
	        $conn->exec($sql); 
	        $result =  "success";
	}
	else 
		{
			$montant = $_POST['montant'];
			$sql = "insert INTO `facture_correspondant` (num_facture,`code`, `montant`, `date_facture`, `paye`,begin_date,end_date) 
		 	VALUES (
		 				'$billnumber',
					 	".$code.", 
					 	".$montant.", 
					 	'".$date_facture->format('Y-m-d H:i:s')."', 
					 	1,
					 	'".$date_facture->format('Y-m-d H:i:s')."',
					 	'".$end_date->format('Y-m-d H:i:s')."'


		 			);";
	        // use exec() because no results are returned
	        $conn->exec($sql); 
	        $result =  "success";
	    }

	
} catch (Exception $e) {
	$result =  $e->getMessage();
}

	
        
    $msg= array("success"=>$result);
    echo json_encode($msg);
?>