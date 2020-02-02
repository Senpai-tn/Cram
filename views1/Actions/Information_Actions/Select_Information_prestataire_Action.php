
<?php
include "../../../Controllers/ConnectionController.php";
if(isset($_POST['num_serie']))
	$num_serie = $_POST['num_serie'];


try{
	
    	$stmt = $conn->prepare("select distinct n_sequence FROM `relation_information_prestataire` WHERE num_serie = '$num_serie' ");
	
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     
                             
                            
      while ($row = $stmt->fetch()) 
      {
        echo '<option value='.$row['n_sequence'].'>'.$row['n_sequence'].'</option>';    
      }
    
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>