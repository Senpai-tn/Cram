<?php
include "../../../Controllers/ConnectionController.php";
if(isset($_POST['departement']))
	$departement = $_POST['departement'];

try{
	    echo "<script>";
      $departement = explode(",",$departement);
      $stmt = $conn->prepare("select GROUP_CONCAT(DISTINCT D.num_serie) as allP  FROM `departement` as D where D.departement = 00   GROUP by departement
      ");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $r = $stmt->fetch();
      $p =  explode(",",$r['allP']);
      for ($i=0; $i < sizeof($p); $i++) 
      { 
        echo "$('#listPrestataire option[value=".$p[$i]."]').attr('selected', true);"; 
      }
      for ($i=0; $i < sizeof($departement); $i++) 
      { 
        $stmt = $conn->prepare("select P.num_serie as N,P.raison_sociale as R FROM prestataire as P, departement as D where departement = '".$departement[$i]."' and P.num_serie = D.num_serie
");
  
        $stmt->execute();
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                     
        while ($row = $stmt->fetch()) 
        {
          echo "$('#listPrestataire option[value=".$row['N']."]').attr('selected', true);"; 
        }
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