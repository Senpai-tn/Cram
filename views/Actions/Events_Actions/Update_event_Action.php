<?php
include "../../../Controllers/ConnectionController.php";
include "../../../Models/Event.php";
$id_event= addslashes($_POST['id_event']);
$nom = addslashes($_POST['nom']);

try {

	$sql = "update evenement SET nom='$nom' WHERE id_event='$id_event'";

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