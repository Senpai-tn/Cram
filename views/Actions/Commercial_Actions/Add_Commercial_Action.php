
<?php 
include "../../../Controllers/ConnectionController.php";
$nom = addslashes($_POST['nom']);
$email = addslashes($_POST['email']);
$telephone = addslashes($_POST['telephone']);
$departement = addslashes($_POST['departement']);
$poste = addslashes($_POST['poste']);
$num_serie= addslashes($_POST['num_serie']);

	try
	{	
		
	 	$sql = "insert into commercial (nom ,email ,telephone ,departement ,poste ,num_serie) 
        VALUES (
				'$nom',
				'$email',
				'$telephone',
				'$departement',
				'$poste',
				'$num_serie'
			)";
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