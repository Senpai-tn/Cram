

<?php

include "../../../Controllers/ConnectionController.php";
  $begin_date = $_POST['begin_date'];
  $end_date = $_POST['end_date'];
  $begin_date = new DateTime($begin_date);
  $end_date = new DateTime($end_date);
try{



	    $stmtV = $conn->prepare("select RIC.paye,GROUP_CONCAT(RIC.id) as N, C.nom,C.code,C.prix,SUM(RIC.valide) as nbr_valide, count(*) as total ,SUM(RIC.paye) as nbr_payee FROM relation_information_correspondant as RIC,correspondant as C WHERE RIC.code = C.code and (MONTH(RIC.created_at) = MONTH('".$begin_date->format('Y-m-d')."') OR MONTH(RIC.created_at)=MONTH('".$end_date->format('Y-m-d')."')) and (YEAR(RIC.created_at)=YEAR('".$begin_date->format('Y-m-d')."') Or YEAR(RIC.created_at)= YEAR('".$end_date->format('Y-m-d')."')) GROUP BY RIC.code");
	    $stmtV->execute();
	    $result = $stmtV->setFetchMode(PDO::FETCH_ASSOC);
      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Montant prime</th>
                      <th>Nombre de valide</th>
                      <th>Signalement non valide</th>
                      <th>Montant Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
		while ($row = $stmtV->fetch()) 
	    {
      	$montant = (int)(($row['nbr_valide'])*$row['prix']);
      	echo '<tr>
          <th scope="row">'.$row['nom'].'</th>
          <td>'.$row['prix'].'</td>
          <td>'.$row['nbr_valide'].'</td>
          <td>'.(int)($row['total']-$row['nbr_valide']).'</td>
          
          <td>'.$montant.' €</td>
          <td>';
            
              echo '<div class="dropdown">
              <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick=select_prestataire();get_correspondant('.$row['code'].',"'.$row['nom'].'");Show_UI('.$row['prix'].','.(int)($row['total']-$row['nbr_payee']).',"'.$row['N'].'")>Facturer</a>
              </div>
            </div>';
            
            
          echo '</td>
        </tr>';

      }

    echo "</tbody> </table>";
                              




}
catch(Exception $e)
{

}

                    
?>