<?php
include "../../../Controllers/ConnectionController.php";

$num = $_POST['num'];
$date= $_POST['date'];

try {

	$sql = "update `facture_client` SET `paye`=1 WHERE num_serie='$num' and MONTH(date_facture) = '$date'
 ";
            // Prepare statement
            $stmt = $conn->prepare($sql);
             // execute the query
            $stmt->execute();
$sql = "update prestataire set nbr_signalement_payee= nbr_signalement_payee+1 where num_serie='$num'
 ";
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