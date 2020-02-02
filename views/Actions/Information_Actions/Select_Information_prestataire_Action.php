
<?php
include "../../../Controllers/ConnectionController.php";
if(isset($_POST['num_serie']))
	$num_serie = $_POST['num_serie'];

if(isset($_POST['date']))
  $date = new DateTime($_POST['date']);




try{
	
    	$stmt = $conn->prepare("select distinct n_sequence FROM `relation_information_prestataire` WHERE 
        num_serie = '$num_serie' and `valide`=1 and YEAR(created_at) = YEAR('2020-01-01') and MONTH(created_at)=MONTH('2020-01-01')");
	
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     
                             
                            
      while ($row = $stmt->fetch()) 
      {
        echo '<option value='.$row['n_sequence'].'>'.$row['n_sequence'] .'</option>';    
      }
    
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>