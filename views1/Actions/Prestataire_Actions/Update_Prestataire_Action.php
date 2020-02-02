<?php
include "../../../Controllers/ConnectionController.php";
    $new_num_serie = addslashes($_POST['new_num_serie']);
    $new_raison_sociale = addslashes($_POST['new_raison_sociale']);
    $new_adresse=addslashes($_POST['new_adresse']);
    $new_code_postal=addslashes($_POST['new_code_postal']);
    $new_abonnement=addslashes($_POST['new_abonnement']);
    $new_telephone=addslashes($_POST['new_telephone']);
    $new_departement=addslashes($_POST['new_departement']);
    $new_honoraire=addslashes($_POST['new_honoraire']);
    $new_etat=addslashes($_POST['new_etat']);
    $new_commentaire=addslashes($_POST['new_commentaire']);
    $new_code_moyen=addslashes($_POST['new_code_moyen']);
    $old_num_serie=addslashes($_POST['old_num_serie']);
    $new_ville=addslashes($_POST['new_ville']);
	$new_street_number=addslashes($_POST['new_street_number']);

    if($new_code_postal=="")
        $new_code_postal=0;

    if($new_telephone=="")
        $new_telephone=0;

    if($new_honoraire=="")
        $new_honoraire=0;

    if($new_abonnement=="")
        $new_abonnement=0;

try {

	$sql = "update prestataire SET 
    num_serie='$new_num_serie', 
    raison_sociale='$new_raison_sociale',
    adresse='$new_adresse',
    code_postal='$new_code_postal',
    abonnement='$new_abonnement',
    telephone='$new_telephone',
    ville = '$new_ville',
    honoraire='$new_honoraire',
    etat='$new_etat',
    commentaire='$new_commentaire',
	street_number='$new_street_number',
    code_moyen='$new_code_moyen' WHERE num_serie='$old_num_serie' ;";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    $sql = "delete FROM `departement` WHERE `num_serie` = '$new_num_serie' ";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    $listD = explode(",",$new_departement);
    for ($i=0; $i < sizeof($listD); $i++) 
    { 
        $sql = "insert INTO `departement` (`num_serie`, `departement`) VALUES ( '$new_num_serie', '".$listD[$i]."');
        )";

    // use exec() because no results are returned
    $conn->exec($sql); 

    }

    // echo a message to say the UPDATE succeeded
   $result =  "success";

} catch (Exception $e) {
	$result =$e;
}

	$msg = array("success"=>$result);
	echo json_encode($msg);
?>