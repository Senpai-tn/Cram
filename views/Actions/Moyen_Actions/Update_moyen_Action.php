<?php
include "../../../Controllers/ConnectionController.php";
//include "../../../Models/Event.php";
$new_code= addslashes($_POST['new_code']);
$chiffre = addslashes($_POST['chiffre']);
$old_code= addslashes($_POST['old_code']);

try {

	$sql = "update moyen SET code='$new_code', chiffre='$chiffre' WHERE code='$old_code'";

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