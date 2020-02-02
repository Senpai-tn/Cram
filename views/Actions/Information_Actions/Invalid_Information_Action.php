
<?php 
include "../../../Controllers/ConnectionController.php";
$num_serie = $_POST['num_serie'];
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
		    	$sql = "update relation_information_prestataire set valide = 0 where n_sequence ='".$id[$i]."' and num_serie='$num_serie'";
		    	// Prepare statement
		    	$stmt = $conn->prepare($sql);
		    	// execute the query
		    	$stmt->execute();
		    }
		}
		
	
	
		
		
	        $result =  "success";

	
} catch (Exception $e) {
	$result =  $e->getMessage();
}

	
        
    $msg= array("success"=>$result);
    echo json_encode($msg);
?>