<?php 
include "../../../Controllers/ConnectionController.php";
//include "../../../Models/Moyen.php";
	try
	{	
		$code =addslashes($_POST["code"]);
		$chiffre = addslashes($_POST["chiffre"]);
	 	$sql = "insert into moyen (code,chiffre)
        VALUES ('$code', '$chiffre')";
        // use exec() because no results are returned
        $conn->beginTransaction();
        $conn->exec($sql); 
        $result = "success";
        $conn->commit();
        
    }
    catch(PDOException $e)
    {
   		 $result =$e->getMessage();
    }

    $msg= array("success"=>$result);
    echo json_encode($msg);
        
       
?>