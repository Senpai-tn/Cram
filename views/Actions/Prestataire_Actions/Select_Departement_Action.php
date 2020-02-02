<?php
include "../../../Controllers/ConnectionController.php";
$num_serie = $_POST['num_serie'];
try{
	
		$stmt = $conn->prepare("select *,GROUP_CONCAT(DISTINCT D.departement) as dep FROM prestataire as P , departement as D where P.num_serie = D.num_serie and P.num_serie = $num_serie GROUP by P.`num_serie`
");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo "<script>";
      $row = $stmt->fetch();
      {

        $listP = explode(",",$row['dep']);
        for ($i=0; $i < sizeof($listP); $i++) { 

            echo "$('#new_departement option[value=$listP[$i]]').attr('selected', true);";

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