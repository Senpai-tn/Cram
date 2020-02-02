<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf; 
try{
    $stmt = $conn->prepare("select *,I.ville as villeI,E.nom as Name_Event ,I.n_sequence as N, M.chiffre as Chiffre_M,I.code_postal as CP,GROUP_CONCAT(DISTINCT C.nom) as listC ,GROUP_CONCAT(DISTINCT P.raison_sociale) as listP FROM information as I,evenement as E,relation_information_correspondant as RIC ,moyen as M, correspondant as C,relation_information_prestataire as RIP, prestataire as P where P.num_serie = RIP.num_serie and I.id_event = E.id_event and RIC.n_sequence = I.n_sequence and  C.code = RIC.code and I.code = M.code and RIP.n_sequence=I.n_sequence and RIC.valide=1 GROUP BY I.n_sequence ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $html = '<center><h1>Liste des informations</h1></center>';
      $html .= ' <table class="table" border=2>
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
        $html .= '<tr>
                      <th scope="row">'.$row["N"].'</th>';
                      $html .= '<td> '.$row["date_facture"].' </td>
                      <td> '.$row["Name_Event"].' </td>
                      <td> '.$row["Chiffre_M"].'</td>
                      <td> '.$row["adresse"] .'</td>
                      <td> '.$row["CP"] .'</td>
                      <td> '.$row["villeI"] .'</td><td>';
                      for ($i=0; $i < sizeof($listC) ; $i++) { 
                              $html .= '<div class="badge badge-primary" onclick=alert("'.$row["N"].'--'.$listC[$i].'")>'.$listC[$i].'</div>';
                      }
                      $html .= "</td><td>";
                      for ($i=0; $i < sizeof($listP) ; $i++) { 
                      $html .= '<div class="badge badge-primary">'.$listP[$i].'</div>';
                     }
                     
        
    }

    $html .= '</tbody></table>';
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}


// Include autoloader 

 
// Reference the Dompdf namespace 

 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf(); 



 // Load HTML content 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream("codexworld", array("Attachment" => 0));


 

?>

