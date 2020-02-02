<?php
include "../../../Controllers/ConnectionController.php";




$name="";
$n_sequence =  $_POST['n_sequence'];
try{

	if(isset($_POST['notvalide']))
  {
    	$stmt = $conn->prepare("select *,GROUP_CONCAT(DISTINCT C.code) as listC FROM `relation_information_correspondant` as RIC ,correspondant as C WHERE RIC.`n_sequence`= '$n_sequence' and `valide`='0' and RIC.code = C.code  GROUP by RIC.n_sequence");
    $name="correspondant_non_valide";
  }
    else  
    {
    	$stmt = $conn->prepare("select *,GROUP_CONCAT(DISTINCT C.code) as listC FROM `relation_information_correspondant` as RIC ,correspondant as C WHERE RIC.`n_sequence`= '$n_sequence' and `valide`='1' and RIC.code = C.code GROUP by RIC.n_sequence ");
      $name="correspondant_valide";
    }
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo "<script>";
      $row = $stmt->fetch();
      {
        $listC = explode(",",$row['listC']);
        for ($i=0; $i < sizeof($listC); $i++) { 
          
          echo "$('#".$name." option[value=' + $listC[$i] + ']').attr('selected', true);";


          
        }
      
      }
    $list="";
   echo "</script>";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>

