
 <?php  
  
  header('Content-Type: application/vnd.ms-excel');  
  header('Content-disposition: attachment; filename=commercial'.rand().'.xls'); 
  
  ?>


<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM prestataire p, commercial c where p.num_serie = c.num_serie");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $data= ' <table class="table">
                  <thead>
                    <tr>
                      <th>Nom & prénom</th>
                      <th>Prestataire</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Départements</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
        $data.= ' <tr>
                      <th scope="row">'.$row['nom'].'</th>
                      <td>'.$row['raison_sociale'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['telephone'].'</td>
                      <td>'.$row['departement'].'</td>
                      
                    </tr>';


        
    }

   $data.= '</tbody></table>';  
    
}
catch(PDOException $e) {
   $data=$e->getMessage();
}

echo $data;
?>