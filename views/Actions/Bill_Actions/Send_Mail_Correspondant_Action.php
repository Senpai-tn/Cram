<?php
require 'class/class.phpmailer.php';
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$num = $_POST['num'];
$email = $_POST['email'];
try{
    $stmt = $conn->prepare("select * FROM `facture_correspondant` as fc, 
correspondant as c 
where c.code = fc.code and num = '$num'");
      $stmt->execute();
    $departement = array(       '00'=>"Tous les départements",
        '01'=>"Ain",
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
      $mois_fr = array("","Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août","Septembre", "Octobre", "Novembre", "Décembre");
      $montant=($row['montant']);
      $begin_date = new DateTime($row['begin_date']);
      $end_date = new DateTime($row['end_date']);

      $html= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<img class="brand-logo" alt="Chameleon admin logo" src="../../../public/app-assets/images/logo/logo.png"/>
<p >
<div id="name" style="text-align: right; margin-right: 100px;">MR/Mme '.$row['nom'].'</div>
<div id="adresse" style="text-align: right; margin-right: 100px;">'.$row['adresse'].'</div>
<div id="code_ville" style="text-align: right; margin-right: 100px;">'.$row['code_postal'].' '.$departement[$row['code_postal'][0].$row['code_postal'][1]].'</div>
</p>

<p style="text-align: center">
Noisy le Grand, 
<div id="date" style="text-align: center">Le '.$days[$i-1].' '.$date->format('d').' '.$mois_fr[(int)$date->format('m')].' '.$date->format('Y').'</div>
</p>
<p>
<div >Correspondant '.$row['code'].'</div>
</p>
<p>
<div id="n_facture" style="text-align: center" ><strong>Remerciement N° '.$row['num_facture'].' </strong></div>
</p>
<p>
<div>Ami correspondant,</div>
<p></p>
  <div>Suite à votre sympathie, je vous prie de bien vouloir trouver si joint un chèque de remerciement en règlement de vos frais et commissions pour informations suite a sinistres</div> </p><br>
  

<table border="1" cellspacing="0" cellpadding="0" width="0" align="center">
  <tr>
    <td width="454" valign="top"><p align="center">Mois de '. $begin_date->format('F Y').' / '.$end_date->format('F Y').'</p></td>
  </tr>
  <tr>
    <td width="454" valign="top"><p align="center">'.($montant).' €</p></td>
  </tr>
</table>
<p> En fin d’exercice, je vous laisse le soin de déclarer les sommes versées en cours d’année.
  Je suis persuadé que notre collaboration sera durable, fructueuse et efficace.</p>
<p>Bien amicalement et toujours le plaisir de vous avoir rapidement en ligne  </p>
<p align="center"><strong>PERMANENCE SIGNALEMENT 24H/24H </strong></p>
<p align="center" ><strong> SMS 06 37 19 69 97 </strong></p>
<p align="center" >Marc ROUSSEAUX </p>




<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 40;
  width: 100%;
  text-align: center;
}
</style>

<div class="footer">
 <hr>
<center>
    <small>
        11, Allée du Bataillon Hildevert 93160 Boisy-le-Grand
    </small>
    <br>
    <small>
        Tél : 06 79 78 14 75 - Email : atcom.mr@gmail.com
    </small>
    <br>
    <font size="2">
        <small>
            EURL au capital de 10.000 euros - SIRET 800 912 743 00013 - APE 7010 Z - RCS Bobigny 800 912 743 - N° Id CEE : FR 32 800 912 743 
        </small>
    </font>
</center>
</div>
</body>
</html>';
     
    



// Include autoloader 

 
// Reference the Dompdf namespace 

 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf(); 



 // Load HTML content 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'portrait');
 
// Render the HTML as PDF 
$dompdf->render(); 

// Output the generated PDF to Browser 
//$dompdf->stream("correspondant".rand(), array("Attachment" => 0));

$date = new DateTime();
$now = $date->format('Y-m-d H-i-s');


$path='Bills/correspondant'.$now.'.pdf';
file_put_contents( $path,  $dompdf->output() );


    $mail = new PHPMailer(true);


        $mail->isSMTP();
        $mail->Host = 'in-v3.mailjet.com'; // host
        $mail->SMTPAuth = true;
        $mail->Username = '5d883a1c418b1e747f1bb3f43ff89b4e'; //username
        $mail->Password = 'ca07469833c3df4e82ca0fb9df6768ad'; //password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; //smtp port

        $mail->setFrom('alaa.fouzai@esprit.tn', 'Ala');
        $mail->addAddress($email);
        $mail->addAttachment($path);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = 'Remerciement N :'.$row['num_facture'];
        $mail->Body    = '<br>Bonjour, </br><br>Veuillez trouver çi-joint mes remerciements pour mes correspondants </br><br>MOIS DE '. $mois_fr[(int)$date->format('m')].' '.$date->format('Y').'</br>';

        $mail->send();
        $result= 'success';


}
catch(PDOException $e) {
    $result=$e->getMessage();
}
$msg= array("success"=>$result);
    echo json_encode($msg);

?>
