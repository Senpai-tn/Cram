<?php
include "../../../Controllers/ConnectionController.php";
if($_POST['filter']!="")
  $filter = $_POST['filter'];
else 
  $filter = "";
try{
    $stmt = $conn->prepare("select *,P.abonnement as Ab,FC.`nbr_Signalement` as m ,nbr_Signalement as nbr_Signalement_per_month FROM `facture_client` as FC, prestataire as P where P.num_serie = FC.num_serie 
 and p.abonnement > 0 HAVING raison_sociale like '%".$filter."%' or date_facture like '%".$filter."%' order by FC.num desc");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>N° Facture</th>
                      <th>Raison sociale</th>
                      <th>Nombre des Signalements</th>
                      <th>Montant Hors Taxe</th>
                      <th>Date de facture</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
       echo '<tr>
                      <td>'.$row['num_facture'].'</td>
                      <td>'.$row['raison_sociale'].'</td>
                      <td>'.$row['m'].'</td>
                      <td>'.$row['montant'].'</td>
                      <td>'.$row['date_facture'].'</td>';
                      $date = $row['date_facture'][5].$row['date_facture'][6];
                      echo '<td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" onclick="get_all_data()" href="../Actions/Bill_Actions/Bill_Prestataire_PDF2.php?num='.$row['num'].'"  target="_blank" >Imprimer facture</a>
                             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#show2" onclick="Show_UI('.$row['num'].')">Envoyer par email</a>
                          </div>
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