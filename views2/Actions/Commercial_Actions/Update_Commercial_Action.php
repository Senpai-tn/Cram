
<?php
include "../../../Controllers/ConnectionController.php";

	$new_nom=addslashes($_POST["new_nom"]);
	$new_email=addslashes($_POST["new_email"]);
	$new_telephone=addslashes($_POST["new_telephone"]);
	$new_departement=addslashes($_POST["new_departement"]);
	$new_poste=addslashes($_POST["new_poste"]);
	$new_num_serie=addslashes($_POST["new_num_serie"]);
	$code = addslashes($_POST["code"]);


try {

	$sql = "update commercial SET 
					nom='$new_nom', 
					telephone='$new_telephone',
					email='$new_email',
					departement='$new_departement',
					poste='$new_poste',
					num_serie='$new_num_serie'

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