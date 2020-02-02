<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf; 
try{
    $stmt = $conn->prepare("select * FROM information");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     
      $date = new DateTime();
      $html= '<p style="text-align: right">'.$date->format('Y-m-d H:i:s').'</p>';
      $html.='<p ><h1 style="text-align: center">Liste des Informations </h1></p>';
      $html .= ' <table class="table" border="1">
                  <thead>
                    <tr>
                      <th>Numéro séquenciel</th>
                      <th>Validité</th>
                      <th>Date & heure</th>
                      <th>Type d"évenement </th>
                      <th>Moyen hydraulique</th>
                      <th>Adresse </th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
      while ($row = $stmt->fetch()) 
      {
        $html.= '<tr>
                      <th scope="row">'.$row["n_sequence"].'</th>
                      <td>';
                      if($row['valid'] == 1 )
                         $html.= '<div class="badge badge-success">Validé</div></td>';
                      else 
                         $html.= '<div class="badge badge-danger">Non validé</div></td>';
                       $html.= '<td> '.$row["date_facture"].' </td>
                      <td> '.$row["id_event"].' </td>
                      <td> '.$row["code"].'</td>
                      <td> '.$row["adresse"] .'</td>
                      <td> '.$row["code_postal"] .'</td>
                      <td> '.$row["ville"] .'</td>
                     
                    </tr>';
        
    }

     $html.= '</tbody></table>';
     
    
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
// (Optional) Setup the paper size and orientation 

 
/*$html = file_get_contents("facture.html"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));*/
?>