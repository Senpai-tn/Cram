<?php
include "../../../Controllers/ConnectionController.php";
if(isset($_POST['departement']))
	$departement = $_POST['departement'];
$n_sequence = $_POST['n_sequence'];
try{
	if(isset($_POST['departement']))
    	$stmt = $conn->prepare("select * FROM prestataire where departement = '$departement'");
	else
    {
      if(isset($_POST['notvalide']))
    {
		  $stmt = $conn->prepare("select * ,GROUP_CONCAT(DISTINCT P.num_serie) as listP FROM relation_information_prestataire as RIP ,prestataire as P WHERE RIP.`n_sequence`= '$n_sequence' and RIP.`num_serie` = P.`num_serie` and RIP.valide = 0 GROUP by RIP.`n_sequence`
      ");
      $name="listInvalidPrestataire";
    }
    else 
    {
      $stmt = $conn->prepare("select * ,GROUP_CONCAT(DISTINCT P.num_serie) as listP FROM relation_information_prestataire as RIP ,prestataire as P WHERE RIP.`n_sequence`= '$n_sequence' and RIP.`num_serie` = P.`num_serie` and RIP.valide = 1 GROUP by RIP.`n_sequence`
      ");
      $name="listValidPrestataire";
    }
      $stmt->execute();
     
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo "<script>";
      $row = $stmt->fetch();
      {
        
        $listP = explode(",",$row['listP']);
        for ($i=0; $i < sizeof($listP); $i++) { 
          
          echo "$('#".$name." option[value=' + $listP[$i] + ']').attr('selected', true);";


          
        }
      
      }
    $list="";
   echo "</script>";

}
}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>