<?php
include "../../../Controllers/ConnectionController.php";

if(isset($_POST['departement']))
	$departement = $_POST['departement'];

try{

    	$stmt = $conn->prepare("select departement as Dep,GROUP_CONCAT(DISTINCT D.num_serie) as ListP FROM `departement` as D , prestataire as P where P.num_serie = D.num_serie and D.departement = ".$departement);
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   
      echo "<script>";                       
                           
      while ($row = $stmt->fetch()) 
      {     
            echo "$('#listGroup option[value=' +". $departement." + ']').attr('selected', true);";    
      }
      echo "</script>";
   
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>