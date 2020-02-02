<?php
include "../../../Controllers/ConnectionController.php";
if($_POST['filter']!="")
  $filter = $_POST['filter'];
else 
  $filter = "";
try{
    $stmt = $conn->prepare("select * FROM facture_correspondant as fc , correspondant as C where fc.code = C.code HAVING nom like '%".$filter."%' or begin_date like '%".$filter."%' or end_date like '%".$filter."%'   order by fc.num desc");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>N° de facture</th>
                      <th>Nom Correspondant</th>
                      <th>Montant</th>
                      <th>Date de facture</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
		  $variable = number_format($row["montant"], 2);
       echo '<tr>
                      <th scope="row">'.$row['num_facture'].'</th>
                      <td>'.$row['nom'].'</td>
                      <td>'.$variable.'</td>
                      <td>'.$row['date_facture'].'</td>
                     
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="../Actions/Bill_Actions/Bill_Correspondant_PDF.php?num='.$row['num'].'"  target="_blank" >Imprimer facture</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#show2" onclick="Show_UI('.$row['num'].')">Envoyer par email</a>';
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