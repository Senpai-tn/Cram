
 <?php  
  
 	header('Content-Type: application/vnd.ms-excel');  
 	header('Content-disposition: attachment; filename=correspondant'.rand().'.xls'); 
	
  ?>

<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM correspondant ");
      $stmt->execute();
      $i = 0;
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $data= ' <table class="table" id="Table_list">
                  <thead>
                     <tr>
                      <th>Code</th>
                      <th>Nom et prenom</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Etat</th>
                      <th>Prix achats</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
       $data.= '<tr>
                      <th scope="row">'.$row["code"].'</th>
                      <td>'.$row["nom"].'</td>
                      <td>'.$row["adresse"].'</td>
                      <td>'.$row["code_postal"].'</td>
                      <td>'.$row["email"].'</td>
                      <td>'.$row["telephone"].'</td>
                      <td>'.$row["etat"].'</td>
                      <td>'.$row["prix"].'</td>
                      
                    </tr>';

        
    }

    $data.= '</tbody></table>';  
    
}
catch(PDOException $e) {
   $list=$e->getMessage();
}

echo $data;
?>