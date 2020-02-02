<?php
	include "../../../Controllers/ConnectionController.php";
	include "../../../Models/User.php";
	$id = $_POST['id'];

	try{
		$stmt = $conn->prepare("select * FROM users where id = '$id'");
	    $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $stmt->fetch()) 
	    {
	    	$user = new User($row["id"],$row["login"],$row["password"]);
		}

}
catch(PDOException $e) {
    $list=null;
}

$msg = array("success"=>$list);
echo json_encode($msg);

?>