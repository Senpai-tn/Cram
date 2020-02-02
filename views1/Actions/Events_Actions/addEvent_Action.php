<?php 
include "../../../Controllers/ConnectionController.php";

	    $nom =addslashes($_POST["nom"]);
        $groupe_mot_cle = addslashes($_POST["groupe_mot_cle"]);
    try
	{	
		
	 	$sql = "insert into evenement (nom,groupe_mot_cle)
        VALUES ('$nom', '$groupe_mot_cle')";
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