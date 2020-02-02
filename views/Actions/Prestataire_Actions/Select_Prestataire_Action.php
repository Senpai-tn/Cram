<?php
include "../../../Controllers/ConnectionController.php";
if(isset($_POST['departement']))
	$departement = $_POST['departement'];


try{
	if(isset($_POST['departement']))
    	$stmt = $conn->prepare("select * FROM prestataire where departement = '$departement'");
	else
		$stmt = $conn->prepare("select * FROM prestataire");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    
                            
      while ($row = $stmt->fetch()) 
      {
        echo '<option value='.$row['num_serie'].'>'.$row['raison_sociale'].'</option>';    
      }
    
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>