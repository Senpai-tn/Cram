

<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

try{

      
     
      
      //$montant=($row['montant']);
      //$d = new DateTime($row['date_facture']);
      $cote = "'";
      $html= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans nom</title>


</head>

<body>
<table cellspacing="1" cellpadding="2" border="1" width=100% >
<tr>
    <td > feuillet</td>
    <td >DATE</td>
    <td >hrs transmis</td>
    <td >NATURE</td>
    <td >MOYEN</td>
    <td >N°</td>
    <td >voie</td>
    <td >adresse </td>
    <td >CP</td>
    <td >VILLE</td>
    <td >L DAS </td>
  </tr>
 ';
 
      $n_sequence = explode(",",$_GET['n_sequence']);
      for ($i=0; $i < sizeof($n_sequence) ; $i++) 
      { 
            $stmt = $conn->prepare("select *,I.date_facture as dateI,I.adresse as adresseI,I.code_postal as cpI FROM `relation_information_prestataire` as RIP , information as I , evenement as E , prestataire as P ,moyen as M where RIP.`n_sequence`=I.n_sequence and RIP.`num_serie` = P.num_serie and P.code_moyen = M.code and I.id_event = E.id_event and RIP.id = '".$n_sequence[$i]."' ");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$days =array("lundi", "mardi", "mercredi","jeudi","vendredi","samedi","dimanche");
            //$date = new DateTime('Europe/London');
            //$i=(int)$date->format('N');
            $row=$stmt->fetch();
            $d = new DateTime($row['dateI']);
            $adr = explode("*",$row['adresseI']);
            $html.= '
            <tr>
                  <td >'.$row['id'].'</td>
                  <td >'.$d->format('Y-m-d').'</td>
                  <td >'.$d->format('H:m').'</td>
                  <td >'.$row['nom'].'</td>
                  <td >'.$row['chiffre'].'</td>
                  <td >'.$adr[0].'</td>
                  <td >'.$adr[1].'</td>
                  <td >'.$adr[2].'</td>
                  <td >'.$row['cpI'].'</td>
                  <td >'.$row['ville'].'</td>
                  <td >'.$row['honoraire'].'</td>
            </tr>';    
      }
  $html.='</table>
</body>
</html>

';
     
    
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
$dompdf->stream("prestataire".rand(), array("Attachment" => 0));


 

?>

