<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM prestataire p, commercial c where p.num_serie = c.num_serie");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo ' <table class="table">
                  <thead>
                    <tr>
                      <th>Nom & prénom</th>
                      <th>Prestataire</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Départements</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
        echo ' <tr>
                      <th scope="row">'.$row['nom'].'</th>
                      <td>'.$row['raison_sociale'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['telephone'].'</td>
                      <td>'.$row['departement'].'</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="Update_row_UI('.$row['code'].')" >Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-supp"  onclick="delete_row_UI('.$row['code'].')">Supprimer</a>
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