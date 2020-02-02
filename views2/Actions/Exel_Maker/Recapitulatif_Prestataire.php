
 <?php  
  
  header('Content-Type: application/vnd.ms-excel');  
  header('Content-disposition: attachment; filename=prestataire'.rand().'.xls'); 
  
  ?>

<?php
include "../../../Controllers/ConnectionController.php";
try{
		$data='<table cellspacing="1" cellpadding="2" border="1" width=100% >
    <tr>
        <td > feuillet</td>
        <td >DATE</td>
        <td >hrs transmis</td>
        <td >NATURE</td>
        <td >MOYEN</td>
        <td >N:</td>
        <td >voie</td>
        <td >adresse </td>
        <td >CP</td>
        <td >VILLE</td>
        <td >LDAS </td>
    </tr>
 ';
 
      $n_sequence = explode(",",$_GET['n_sequence']);
      for ($i=0; $i < sizeof($n_sequence) ; $i++) 
      { 
            $stmt = $conn->prepare("select * FROM `relation_information_prestataire` as RIP , information as I , evenement as E , prestataire as P ,moyen as M where RIP.`n_sequence`=I.n_sequence and RIP.`num_serie` = P.num_serie and P.code_moyen = M.code and I.id_event = E.id_event and RIP.id = '".$n_sequence[$i]."' ");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$days =array("lundi", "mardi", "mercredi","jeudi","vendredi","samedi","dimanche");
            //$date = new DateTime('Europe/London');
            //$i=(int)$date->format('N');
            $row=$stmt->fetch();
            $d = new DateTime($row['date_facture']);
            $data.= '
            <tr>
                  <td >'.$row['id'].'</td>
                  <td >'.$d->format('Y-m-d').'</td>
                  <td >'.$d->format('H:m').'</td>
                  <td >'.$row['nom'].'</td>
                  <td >'.$row['chiffre'].'</td>
                  <td >N°</td>
                  <td >voie</td>
                  <td >'.$row['adresse'].'</td>
                  <td >'.$row['code_postal'].'</td>
                  <td >'.$row['ville'].'</td>
                  <td >'.$row['honoraire'].'</td>
            </tr>';    
      }
  $data.='</table>';
  

}
catch(PDOException $e) {
   $data=$e->getMessage();
}


echo $data;


?>