<?php
include "../../../Controllers/ConnectionController.php";

function test($num)
{
    return str_replace('"','',$num);
}

try{
		$stmt = $conn->prepare("select *,I.ville as V,E.nom as Name_Event ,I.n_sequence as N, M.chiffre as Chiffre_M,I.code_postal as CP,GROUP_CONCAT(DISTINCT C.nom) as listC ,GROUP_CONCAT(DISTINCT P.raison_sociale) as listP,I.date_facture as dateI ,I.adresse as adressI FROM information as I,evenement as E,relation_information_correspondant as RIC ,moyen as M, correspondant as C,relation_information_prestataire as RIP, prestataire as P where P.num_serie = RIP.num_serie and I.id_event = E.id_event and RIC.n_sequence = I.n_sequence and  C.code = RIC.code and I.code = M.code and RIP.n_sequence=I.n_sequence  GROUP BY I.n_sequence ");
	    $stmt->execute();

	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       /*<th>Validité</th>*/
	    echo ' <table class="table">
                  <thead>
                    <tr>
                      <th>Numéro séquenciel</th>
                      <th>Date & heure</th>
                      <th>Evenement </th>
                      <th>Moyen hydraulique</th>
                      <th>Adresse </th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>Correspondants validés et non validés</td>
                      <th>Prestataires validés et non validés</td>
                      <th>Action</td>
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch())
	    {
        $listC = explode(",",$row['listC']);
        $listP = explode(",",$row['listP']);
        $adr = explode("*",$row['adressI']);
	    	echo '<tr>
                      <th scope="row">'.$row["N"].'</th>';
                      echo '<td> '.$row["dateI"].' </td>
                      <td> '.$row["Name_Event"].' </td>
                      <td> '.$row["Chiffre_M"].'</td>
                      <td> '.$adr[0].' '.$adr[1].' '.$adr[2].'</td>
                      <td> '.$row["CP"] .'</td>
                      <td> '.$row["V"] .'</td><td>';
                      for ($i=0; $i < sizeof($listC) ; $i++) {
                              echo '<div class="badge badge-primary" >'.$listC[$i].'</div>';

                      }
                      echo "</td>
                      <td>";
                      for ($i=0; $i < sizeof($listP) ; $i++) {
                      echo '<div class="badge badge-primary">'.$listP[$i].'</div>';
                     }
                    echo'<td> <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modal2" onclick="get_one_information(\''.$row['N'].'\');Update(\''.$row['listC'].'\',\''.$row['listP'].'\');">Modifier</a></td>';

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
