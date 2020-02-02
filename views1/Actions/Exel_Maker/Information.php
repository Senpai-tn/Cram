
 <?php  
  
 	header('Content-Type: application/vnd.ms-excel');  
 	header('Content-disposition: attachment; filename=information'.rand().'.xls'); 

include "../../../Controllers/ConnectionController.php";

try{
    $stmt = $conn->prepare("select *,E.nom as Name_Event ,I.n_sequence as N, M.chiffre as Chiffre_M,I.code_postal as CP,GROUP_CONCAT(DISTINCT C.nom) as listC ,GROUP_CONCAT(DISTINCT P.raison_sociale) as listP FROM information as I,evenement as E,relation_information_correspondant as RIC ,moyen as M, correspondant as C,relation_information_prestataire as RIP, prestataire as P where P.num_serie = RIP.num_serie and I.id_event = E.id_event and RIC.n_sequence = I.n_sequence and  C.code = RIC.code and I.code = M.code GROUP BY I.n_sequence ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       /*<th>Validité</th>*/
      $data= ' <table class="table" border= 1>
                  <thead>
                    <tr>
                      <th>Numéro séquenciel</th>
                      <th>Date & heure</th>
                      <th>Evenement </th>
                      <th>Moyen hydraulique</th>
                      <th>Adresse </th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>Correspondants</td>
                      <th>Prestataires</td>
                     
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
        $listC = explode(",",$row['listC']);
        $listP = explode(",",$row['listP']);
        //echo '<script>document.write('.$row['listC'].')</script>';
        $data.= '<tr>
                      <th scope="row">'.$row["N"].'</th>';
                      $data.= '<td> '.$row["date_facture"].' </td>
                      <td> '.$row["Name_Event"].' </td>
                      <td> '.$row["Chiffre_M"].'</td>
                      <td> '.$row["adresse"] .'</td>
                      <td> '.$row["CP"] .'</td>
                      <td> '.$row["ville"] .'</td><td>';
                      for ($i=0; $i < sizeof($listC) ; $i++) { 
                              $data.= '<div class="badge badge-primary" onclick=alert("'.$row["N"].'--'.$listC[$i].'")>'.$listC[$i].'</div>';
                      }
                      $data.= "</td><td>";
                      for ($i=0; $i < sizeof($listP) ; $i++) { 
                      $data.= '<div class="badge badge-primary">'.$listC[$i].'</div>';
                     }
                     
        
    }

    $data.= '</tbody></table>';
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

echo $data;


?>
