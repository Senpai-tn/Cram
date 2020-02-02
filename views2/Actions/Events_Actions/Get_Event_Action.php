<?php
	include "../../../Controllers/ConnectionController.php";
	include "../../../Models/Event.php";
	$id_event = $_POST["id_event"];

	try{
		$stmt = $conn->prepare("select * FROM evenement evenement where id_event = '$id_event'");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$event = new Event($row["nom"],$row["groupe_mot_cle"]);
	    	$event->id_event = $row["id_event"];
	    	$list=$event;
	    	
	    	
		}

}
catch(PDOException $e) {
    $list=null;
}

$msg = array("success"=>$list);
echo json_encode($msg);

?>