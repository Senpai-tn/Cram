<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM facture_correspondant ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>N° de facture</th>
                      <th>Code Correspondant</th>
                      <th>Montant</th>
                      <th>Date de facture</th>
                      <th>Payer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
       echo '<tr>
                      <th scope="row">'.$row['num'].'</th>
                      <td>'.$row['code'].'</td>
                      <td>'.$row['montant'].'</td>
                      <td>'.$row['date_facture'].'</td>
                      <td>';
                      if($row['paye'] == '1')
                        echo 'oui'; 
                      else 
                        echo 'non';
                      echo '</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item"  data-toggle="modal" data-target="#modal_facture">Imprimer facture</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#show2">Envoyer par email</a>
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