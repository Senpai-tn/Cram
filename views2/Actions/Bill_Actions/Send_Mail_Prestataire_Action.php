

<?php
include "../../../Controllers/ConnectionController.php";
require_once '../../../dompdf/autoload.inc.php';
require 'class/class.phpmailer.php';

use Dompdf\Dompdf;
$num = $_POST['num']; 

$email = $_POST['email'];
try{

      

      $stmt = $conn->prepare("select * , SUM(nbr_Signalement) as nbr_Signalement_per_month,SUM(P.abonnement+(FC.`nbr_Signalement`*P.honoraire)) as  total FROM `facture_client` as FC, prestataire as P where P.num_serie = FC.num_serie and  FC.num = '$num'");
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
      <td>'.$row['nbr_Signalement_per_month'].' X '.$row['honoraire'].'</td>
      <td>'.(float)($row['nbr_Signalement_per_month']*$row['honoraire']).' Euros</td>
      
    </tr>
    <tr>
      <td>Retrocession</td>
      <td>&nbsp;</td>
      <td>'.$row['retrocession'].' Euros</td>
      
    </tr>
    <tr>
      <td>Montant </td>
      <td>&nbsp;</td>
      <td>'.((($row['nbr_Signalement_per_month']*$row['honoraire'])+($row['abonnement']))-$row['retrocession']).' Euros</td>
     
    </tr>
    <tr>
      <td>T.V.A 20% </td>
      <td>&nbsp;</td>
      <td>'.(float)(((($row['nbr_Signalement_per_month']*$row['honoraire'])+($row['abonnement']))-$row['retrocession'])/5).' Euros</td>
     
    </tr>
    <tr>
      <td>TOTAL T.T.C </td>
      <td>&nbsp;</td>
      <td>'.(float)(((($row['nbr_Signalement_per_month']*$row['honoraire'])+($row['abonnement']))-$row['retrocession'])*1.2).' Euros</td>
      
    </tr>
  </tbody>
</table>

<p>                        valeur en votre aimable  règlement </p>
<p>&nbsp;</p>
<p>                                                                                                Marc  ROUSSEAUX </p>

</body>
</html>
';
     



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

$date_file = new DateTime();
$now = $date_file->format('Y-m-d H-i-s');


$path='Bills/prestataire'.$now.'.pdf';
file_put_contents( $path,  $dompdf->output() );


        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';                 //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';                            //Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'khaledsahli36@gmail.com';                           //Sets SMTP username
        $mail->Password = 'delahk96';                           //Sets SMTP password
        $mail->SMTPSecure = 'ssl';                      //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'khaledsahli36@gmail.com';        //Sets the From email address for the message
        $mail->FromName = 'CRAM';                     //Sets the From name of the message
        $mail->AddAddress($email, 'Logiciel Cram');   //Adds a "To" address
        //$mail->AddCC($_POST["email"], $_POST["name"]);    //Adds a "Cc" address
        $mail->addAttachment("Bills/prestataire".$now.'.pdf');
        $mail->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                            //Sets message type to HTML             
        $mail->Subject = 'Honoraire N :'.$row['num_facture'];                     //Sets the Subject of the message
        $mail->Body = '<br>Bonjour, </br><br>Veuillez trouver çi-joint honoraires pour  prestations de service <br>
  <br>
  MOIS DE '. $d->format('F').' '.$d->format('Y').'</br>';
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




