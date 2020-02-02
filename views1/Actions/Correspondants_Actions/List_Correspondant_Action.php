<?php
include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select * FROM correspondant ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo ' <table class="table" id="Table_list">
                  <thead>
                     <tr>
                      <th>Code</th>
                      <th>Nom et prenom</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Etat</th>
                      <th>Prix achats</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
		  $variable = number_format($row["prix"], 2);
       echo '<tr>
                      <th scope="row">'.$row["code"].'</th>
                      <td>'.$row["nom"].'</td>
                      <td>'.$row["adresse"].'</td>
                      <td>'.$row["code_postal"].'</td>
                      <td>'.$row["ville"].'</td>
                      <td>'.$row["email"].'</td>
                      <td>'.$row["telephone"].'</td>
                      <td>';
                      if($row["etat"]=='passif')
                        echo '<span class="badge badge-danger">Passif</span>';
                      else
                        echo '<span class="badge badge-success">Actif</span>';
                      echo '</td>
                      <td>'.$variable.'</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" onclick="Update_row_UI('.$row["code"].')">Modifier</a>
                            <a class="dropdown-item" href="#" onclick=delete_row_UI("'.$row["code"].'")>Supprimer</a>
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