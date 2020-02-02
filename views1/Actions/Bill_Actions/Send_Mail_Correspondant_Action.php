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
      $begin_date = new DateTime($row['begin_date']);
      $end_date = new DateTime($row['end_date']);

      $html= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<p >
<div id="name" style="text-align: right; margin-right: 100px;">MR/Mme '.$row['nom'].'</div>
<div id="adresse" style="text-align: right; margin-right: 100px;">'.$row['adresse'].'</div>
<div id="code_ville" style="text-align: right; margin-right: 100px;">'.$row['code_postal'].' '.$departement[(int)$row['departement']-1].'</div>
</p>

<p style="text-align: center">
Noisy le Grand, 
<div id="date" style="text-align: center">Le '.$days[$i-1].' '.$date->format('d F Y').'</div>
</p>
<p>
<div style="margin-left: 100px;">Correspondant '.$row['code'].'</div>
</p>
<p>
<div id="n_facture" style="text-align: center" ><strong>Remerciement N° '.$row['num_facture'].' </strong></div>
</p>
<p>
<div style="margin-left: 150px;">Ami correspondant,</div>
  <div style="margin-left: 100px; margin-right: 100px;">Suite à votre sympathie, je vous prie de bien vouloir trouver si joint un chèque de remerciement en règlement de vos frais et commissions pour informations suite a sinistres</div> </p><br>
  

<table border="1" cellspacing="0" cellpadding="0" width="0" align="center">
  <tr>
    <td width="454" valign="top"><p align="center">Mois de '. $begin_date->format('F Y').' / '.$end_date->format('F Y').'</p></td>
  </tr>
  <tr>
    <td width="454" valign="top"><p align="center">'.($montant).' €</p></td>
  </tr>
</table>
<p style="margin-left: 100px;"> En fin d’exercice, je vous laisse le soin de déclarer les sommes versées en cours d’année.
  Je suis persuadé que notre collaboration sera durable, fructueuse et efficace  </p>

<p style="margin-left: 100px;">Bien amicalement et toujours le plaisir de vous avoir rapidement en ligne  </p>
<br>
<p align="center"><strong>PERMANENCE SIGNALEMENT 24H/24H </strong></p>
<p align="center" ><strong> SMS 06 37 19 69 97 </strong></p>
<p align="center" >Marc ROUSSEAUX </p>

</body>
</html>';
     
    



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
//$dompdf->stream("correspondant".rand(), array("Attachment" => 0));

$date = new DateTime();
$now = $date->format('Y-m-d H-i-s');


$path='Bills/correspondant'.$now.'.pdf';
file_put_contents( $path,  $dompdf->output() );


        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'SSL0.OVH.NET';                 //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';                            //Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'zied@bens-development.com';                           //Sets SMTP username
        $mail->Password = 'VecTra1987';                           //Sets SMTP password
        $mail->SMTPSecure = 'ssl';                      //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'zied@digi-dev.net';        //Sets the From email address for the message
        $mail->FromName = 'CRAM';                     //Sets the From name of the message
        $mail->AddAddress($email, 'Logiciel Cram');   //Adds a "To" address
        //$mail->AddCC($_POST["email"], $_POST["name"]);    //Adds a "Cc" address
        $mail->addAttachment("Bills/correspondant".$now.'.pdf');
        $mail->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                            //Sets message type to HTML             
        $mail->Subject = 'Remerciement N :'.$num;                     //Sets the Subject of the message
        $mail->Body = '<br>Bonjour, </br><br>Veuillez trouver çi-joint la facture de '. $begin_date->format('F Y').' et '.$end_date->format('F Y').'</br>';
        if($mail->Send())
            $result = 'success'; 
        else 
            $result = 'error';
    
    $list="";
	

}
catch(PDOException $e) {
   $list=$e->getMessage();
}
$msg= array("success"=>$result);
    echo json_encode($msg);






 

?>

