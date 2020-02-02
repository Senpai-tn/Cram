<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM evenement");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
                     
                            
      while ($row = $stmt->fetch()) 
      {
        echo '<option  value='.$row['id_event'].'>'.$row['nom'].'</option>';    
      }
   
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);


?>