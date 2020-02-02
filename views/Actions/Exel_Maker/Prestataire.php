
 <?php  
  
  header('Content-Type: application/vnd.ms-excel');  
  header('Content-disposition: attachment; filename=prestataire'.rand().'.xls'); 
  
  ?>

<?php
include "../../../Controllers/ConnectionController.php";
try{
		$stmt = $conn->prepare("select * FROM prestataire");
	    $stmt->execute();
	               

	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $data= ' <table class="table" id="Table_list">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Etat</th>
                      <th>Raison social</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Départements</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch()) 
	    {
    
	    	$data.= '<tr><td>'.$row["num_serie"].'</td> <td>'.$row["etat"].'</td> <td>'.$row['raison_sociale'].'</td><td>'.$row['adresse'].'</td><td>'.$row['code_postal'].'</td><td>'.$row['honoraire'].'</td><td>'.$row['telephone'].'</td> <td>'.$row['departement'].'</td>
          </tr>';
	    	
		}

		$data.= '</tbody></table>';


}
catch(PDOException $e) {
   $$data=$e->getMessage();
}


echo $data;


?>