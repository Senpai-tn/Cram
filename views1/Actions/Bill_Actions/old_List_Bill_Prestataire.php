<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * ,FC.nbr_Signalement as nb FROM `facture_client` as FC, prestataire as P where P.num_serie = FC.num_serie GROUP BY MONTH(date_facture),P.num_serie

");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo '<table class="table">
                  <thead>
                    <tr>
                      
                      <th>Raison sociale</th>
                      
                      <th>Nombre total des Signalements</th>
                      <th>Montant Hors Taxe</th>
                      <th>Date de facture</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
       echo '<tr>
                      
                      <td>'.$row['raison_sociale'].'</td>
                      
                      <td>'.$row['nb'].'</td>
                      <td>'.$row['montant'].'</td>
                      <td>'.$row['date_facture'].'</td>';
                      
                      
                      
                      $date = $row['date_facture'][5].$row['date_facture'][6];
                      echo '<td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" onclick="get_all_data()" href="../Actions/Bill_Actions/Bill_Prestataire_PDF?num='.$row['num_serie'].'&date='.$row['date_facture'].'"  target="_blank" >Imprimer facture</a>';
                            
                              echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#show2" onclick=Payer_Facture('.$row['num_serie'].',"'.$date.'") >Facturer</a>';
                            
                          echo '</div>
                        </div>
                      </td>
                    </tr>';

        
    }

    echo '</tbody></table>';  
    $list="";
}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('error' => $list );
json_encode($msg);
?>