
<?php 
include "../../../Controllers/ConnectionController.php";
$code=addslashes($_POST['code']);
$p1=floatval($_POST['p1']);
$q1=floatval($_POST['q1']);
$p2=floatval($_POST['p2']);
$q2=floatval($_POST['q2']);
$p3=floatval($_POST['p3']);
$q3=floatval($_POST['q3']);
$date_facture = new DateTime();
$montant = (float)(($p1*$q1)+($p2*$q2)+($p3*$q3));
$montant = (float)($montant * (float)(120 /100)); 
	try
	{	
		
	 	$sql = "insert INTO `facture_correspondant` (`code`, `montant`, `date_facture`, `paye`, `nbr_Abonnement`, `p_Abonnement`, `nbr_Signalement`, `p_Signalement`, `nbr_Bonus`, `p_Bonus`) 
	 	VALUES (
				 	".$code.", 
				 	".$montant.", 
				 	'".$date_facture->format('Y-m-d H:i:s')."', 
				 	1, 
				 	".$q1.", 
				 	".$p1.", 
				 	".$q2.", 
				 	".$p2.", 
				 	".$q3.", 
				 	".$p3."
	 			);";
        // use exec() because no results are returned
        $conn->exec($sql); 
        $result =  "success";
    }
    catch(PDOException $e)
    {
   		 $result =$e->getMessage();
    }
        
       $msg= array("success"=>$result);
    echo json_encode($msg);
?>