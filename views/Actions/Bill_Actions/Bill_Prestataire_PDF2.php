

<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$num = $_GET['num']; 

try{

      

      $stmt = $conn->prepare("select *  FROM `facture_client` as FC, prestataire as P where P.num_serie = FC.num_serie and  FC.num = '$num'");
      $stmt->execute();
      $departement = array(       '01'=>"Ain",
                              '02'=>"Aisne",
                              '03'=>"Allier",
                              '04'=>"Alpes-de-Haute-Provence",
                              '05'=>"Hautes-Alpes",
                              '06'=>"Alpes-Maritimes",
                              '07'=>"Ardèche",
                              '08'=>"Ardennes",
                              '09'=>"Ariège",
                              '10'=>"Aube",
                              '11'=>"Aude",
                              '12'=>"Aveyron",
                              '13'=>"Bouches-du-Rhône",
                              '14'=>"Calvados",
                              '15'=>"Cantal",
                              '16'=>"Charente",
                              '17'=>"Charente-Maritime",
                              '18'=>"Cher",
                              '19'=>"Corrèze",
                              '2A'=>"Corse-du-Sud",
                              '2B'=>"Haute-Corse",
                              '21'=>"Côte-d'Or",
                              '22'=>"Côtes-d'Armor",
                              '23'=>"Creuse",
                              '24'=>"Dordogne",
                              '25'=>"Doubs",
                              '26'=>"Drôme",
                              '27'=>"Eure",
                              '28'=>"Eure-et-Loir",
                              '29'=>"Finistère",
                              '30'=>"Gard",
                              '31'=>"Haute-Garonne",
                              '32'=>"Gers",
                              '33'=>"Gironde",
                              '34'=>"Hérault",
                              '35'=>"Ille-et-Vilaine",
                              '36'=>"Indre",
                              '37'=>"Indre-et-Loire",
                              '38'=>"Isère",
                              '39'=>"Jura",
                              '40'=>"Landes",
                              '41'=>"Loir-et-Cher",
                              '42'=>"Loire",
                              '43'=>"Haute-Loire",
                              '44'=>"Loire-Atlantique",
                              '45'=>"Loiret",
                              '46'=>"Lot",
                              '47'=>"Lot-et-Garonne",
                              '48'=>"Lozère",
                              '49'=>"Maine-et-Loire",
                              '50'=>"Manche",
                              '51'=>"Marne",
                              '52'=>"Haute-Marne",
                              '53'=>"Mayenne",
                              '54'=>"Meurthe-et-Moselle",
                              '55'=>"Meuse",
                              '56'=>"Morbihan",
                              '57'=>"Moselle",
                              '58'=>"Nièvre",
                              '59'=>"Nord",
                              '60'=>"Oise",
                              '61'=>"Orne",
                              '62'=>"Pas-de-Calais",
                              '63'=>"Puy-de-Dôme",
                              '64'=>"Pyrénées-Atlantiques",
                              '65'=>"Hautes-Pyrénées",
                              '66'=>"Pyrénées-Orientales",
                              '67'=>"Bas-Rhin",
                              '68'=>"Haut-Rhin",
                              '69'=>"Rhône",
                              '70'=>"Haute-Saône",
                              '71'=>"Saône-et-Loire",
                              '72'=>"Sarthe",
                              '73'=>"Savoie",
                              '74'=>"Haute-Savoie",
                              '75'=>"Paris",
                              '76'=>"Seine-Maritime",
                              '77'=>"Seine-et-Marne",
                              '78'=>"Yvelines",
                              '79'=>"Deux-Sèvres",
                              '80'=>"Somme",
                              '81'=>"Tarn",
                              '82'=>"Tarn-et-Garonne",
                              '83'=>"Var",
                              '84'=>"Vaucluse",
                              '85'=>"Vendée",
                              '86'=>"Vienne",
                              '87'=>"Haute-Vienne",
                              '88'=>"Vosges",
                              '89'=>"Yonne",
                              '90'=>"Territoire de Belfort",
                              '91'=>"Essonne",
                              '92'=>"Hauts-de-Seine",
                              '93'=>"Seine-Saint-Denis",
                              '94'=>"Val-de-Marne",
                              '95'=>"Val-d'Oise");
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




