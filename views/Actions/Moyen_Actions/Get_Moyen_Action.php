<?php
	include "../../../Controllers/ConnectionController.php";
	include '../../../Models/Moyen.php';
	
	$code = $_POST["code"];

	try{
		$stmt = $conn->prepare("select * FROM moyen where code = '$code'");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$moyen = new Moyen($row["code"],$row["chiffre"]);
	    	
	    	$list=$moyen;
	    	
	    	
		}

}
catch(PDOException $e) {
    $list=null;
}

$msg = array("success"=>$list);
echo json_encode($msg);

?>