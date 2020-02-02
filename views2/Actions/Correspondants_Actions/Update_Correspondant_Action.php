<?php
include "../../../Controllers/ConnectionController.php";
//include "../../../Models/Event.php";
$code= addslashes($_POST['code']);
$new_nom = addslashes($_POST['new_nom']);
if($_POST['new_telephone']!="")
    $new_telephone= addslashes($_POST['new_telephone']);
else 
    $new_telephone=0;


$new_adresse= addslashes($_POST['new_adresse']);
if($_POST['new_code_postal'] !="")
    $new_code_postal= addslashes($_POST['new_code_postal']);
else 
    $new_code_postal=0;


$new_email= addslashes($_POST['new_email']);
$new_etat= addslashes($_POST['new_etat']);
$new_ville= addslashes($_POST['new_ville']);
if($_POST['new_prix']!="")
    $new_prix= addslashes($_POST['new_prix']);
else
    $new_prix = 0 ;






try {

	$sql = "update correspondant SET nom='$new_nom', telephone='$new_telephone' , adresse='$new_adresse',
code_postal='$new_code_postal',
email='$new_email',
etat='$new_etat',
prix='$new_prix',
ville='$new_ville' 
WHERE code='$code'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
   $result =  "success";

} catch (Exception $e) {
	$result =$e;
}

	$msg = array("success"=>$result);
	echo json_encode($msg);
?>