

<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$num = $_GET['num']; 

try{

      

      $stmt = $conn->prepare("select *  FROM `facture_client` as FC, prestataire as P where P.num_serie = FC.num_serie and  FC.num = '$num'");
      $stmt->execute();
      $departement = array("Ain",
                              "Aisne",
                              "Allier",
                              "Alpes-de-Haute-Provence",
                              "Hautes-Alpes",
                              "Alpes-Maritimes",
                              "Ardèche",
                              "Ardennes",
                              "Ariège",
                              "Aube",
                              "Aude",
                              "Aveyron",
                              "Bouches-du-Rhône",
                              "Calvados",
                              "Cantal",
                              "Charente",
                              "Charente-Maritime",
                              "Cher",
                              "Corrèze",
                              "Corse-du-Sud",
                              "Haute-Corse",
                              "Côte-d'Or",
                              "Côtes-d'Armor",
                              "Creuse",
                              "Dordogne",
                              "Doubs",
                              "Drôme",
                              "Eure",
                              "Eure-et-Loir",
                              "Finistère",
                              "Gard",
                              "Haute-Garonne",
                              "Gers",
                              "Gironde",
                              "Hérault",
                              "Ille-et-Vilaine",
                              "Indre",
                              "Indre-et-Loire",
                              "Isère",
                              "Jura",
                              "Landes",
                              "Loir-et-Cher",
                              "Loire",
                              "Haute-Loire",
                              "Loire-Atlantique",
                              "Loiret",
                              "Lot",
                              "Lot-et-Garonne",
                              "Lozère",
                              "Maine-et-Loire",
                              "Manche",
                              "Marne",
                              "Haute-Marne",
                              "Mayenne",
                              "Meurthe-et-Moselle",
                              "Meuse",
                              "Morbihan",
                              "Moselle",
                              "Nièvre",
                              "Nord",
                              "Oise",
                              "Orne",
                              "Pas-de-Calais",
                              "Puy-de-Dôme",
                              "Pyrénées-Atlantiques",
                              "Hautes-Pyrénées",
                              "Pyrénées-Orientales",
                              "Bas-Rhin",
                              "Haut-Rhin",
                              "Rhône",
                              "Haute-Saône",
                              "Saône-et-Loire",
                              "Sarthe",
                              "Savoie",
                              "Haute-Savoie",
                              "Paris",
                              "Seine-Maritime",
                              "Seine-et-Marne",
                              "Yvelines",
                              "Deux-Sèvres",
                              "Somme",
                              "Tarn",
                              "Tarn-et-Garonne",
                              "Var",
                              "Vaucluse",
                              "Vendée",
                              "Vienne",
                              "Haute-Vienne",
                              "Vosges",
                              "Yonne",
                              "Territoire de Belfort",
                              "Essonne",
                              "Hauts-de-Seine",
                              "Seine-Saint-Denis",
                              "Val-de-Marne",
                              "Val-d'Oise");
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $days =array("lundi", "mardi", "mercredi","jeudi","vendredi","samedi","dimanche");
      $date = new DateTime('Europe/London');
      $i=(int)$date->format('N');
      $row=$stmt->fetch();
      
      $montant=($row['montant']);
      $d = new DateTime($row['date_facture']);
      $cote = "'";
      $html= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans nom</title>';

$html.='</head>

<body>
<p style="text-align: right; margin-right: 100px;"> '.$row['raison_sociale'].'
<br>'.$row['adresse'].'<br>
  </p>


<center>
<p style="text-align: center;"><strong> NOISY LE GRAND, LE '.$days[$i-1].' '.$date->format('d F Y').' </strong></p>
<br>
<p style="margin-left: 100px;">NOTE D'.$cote.'honoraire N° '.$row['num_facture'].' </p>
</center>
<p style="margin-left: 100px;">Honoraires pour  prestations de service <br>
  <br>
  MOIS DE '. $d->format('F').' '.$d->format('Y').' </p>

<table cellpadding="5" cellspacing="10" style="margin-left:62px">
  <tbody>
    <tr>
      <td>Abonnement</td>
      <td>&nbsp;</td>
      <td>'.$row['abonnement'].' Euros</td>
      
    </tr>
    <tr>
      <td>Signalements</td>
      <td>'.$row['nbr_Signalement'].' X '.$row['paye'].'</td>
      <td>'.(float)($row['nbr_Signalement']*$row['paye']).' Euros</td>
      
    </tr>
    <tr>
      <td>Retrocession</td>
      <td>&nbsp;</td>
      <td>'.$row['retrocession'].' Euros</td>
      
    </tr>
    <tr>
      <td>Montant </td>
      <td>&nbsp;</td>
      <td>'.((($row['nbr_Signalement']*$row['paye'])+($row['abonnement']))-$row['retrocession']).' Euros</td>
     
    </tr>
    <tr>
      <td>T.V.A 20% </td>
      <td>&nbsp;</td>
      <td>'.(float)(((($row['nbr_Signalement']*$row['paye'])+($row['abonnement']))-$row['retrocession'])/5).' Euros</td>
     
    </tr>
    <tr>
      <td>TOTAL T.T.C </td>
      <td>&nbsp;</td>
      <td>'.(float)(((($row['nbr_Signalement']*$row['paye'])+($row['abonnement']))-$row['retrocession'])*1.2).' Euros</td>
      
    </tr>
  </tbody>
</table>

<p>                        valeur en votre aimable  règlement </p>
<p>&nbsp;</p>
<p>                                                                                                Marc  ROUSSEAUX </p>

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




