<?php
include "../../../Controllers/ConnectionController.php";

$begin_date = new DateTime($_POST['begin_date']);
try{


	    $stmtV = $conn->prepare("select * ,count(*) as total, SUM(RIP.`valide`) as nbr_valid,GROUP_CONCAT(RIP.id) as N FROM relation_information_prestataire as RIP,prestataire as P WHERE RIP.num_serie = P.num_serie 
 and MONTH(RIP.created_at) = MONTH('".$begin_date->format('Y-m-d')."') and YEAR(RIP.created_at) = YEAR('".$begin_date->format('Y-m-d')."')  GROUP BY RIP.num_serie
");
	    $stmtV->execute();


	    $result = $stmtV->setFetchMode(PDO::FETCH_ASSOC);

      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>Raison sociale</th>
                      <th>Abonnement</th>
                      <th>Nombre des signalements validés</th>
                      <th>Nombre des signalements non validés</th>
                      <th>Honoraire</th>
                      <th>Total HT </th>
                      <th>Total TTC </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
		while ($row = $stmtV->fetch())
	    {
      	$n_Vsig_non_payee = (float)($row['nbr_valid']);
        $n_Isig_non_payee = (float)($row['total']-$row['nbr_valid']);
        $n = $row['num_serie'];
      	echo '<tr>

                      <th scope="row">'.$row['raison_sociale'].'</th>
                      <td>'.$row['abonnement'].'</td>
                      <td>'.$n_Vsig_non_payee.'</td>
                      <td>'.$n_Isig_non_payee.'</td>
                      <td>'.$row['honoraire']*$n_Vsig_non_payee.'</td>
                      <td>'.(float)((($n_Vsig_non_payee)*$row['honoraire'])+$row['abonnement']).'</td>
                      <td>'.(float)(((($n_Vsig_non_payee)*$row['honoraire'])+$row['abonnement'])*1.2).'</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="get_prestataire(\''.$n.'\',\''.$row['raison_sociale'].'\');Show_UI(\''.$row['abonnement'].'\',\''.$n_Vsig_non_payee.'\',\''.(float)($row['honoraire']).'\',\''.(float)($row['total']*$row['honoraire']).'\',
														\''.(float)($row['total']*$row['honoraire']*1.2).'\',\''.$row['N'].'\');Select_Information(\''.$row['num_serie'].'\');"
                              >Facturer</a>
                          </div>
                        </div>
                      </td>
                    </tr>';
      }

    echo "</tbody> </table>";





}
catch(Exception $e)
{

}


?>
