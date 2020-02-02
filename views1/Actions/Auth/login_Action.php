<?php
include "../../../Controllers/ConnectionController.php";
$login = addslashes($_POST['login']);
$password= MD5($_POST['password']);






try {
    
   $stmt = $conn->prepare("select * from users where login='$login' and password='$password' ");
     $stmt->execute();
	    
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = 'null';
	    while($row = $stmt->fetch())
	    {
			$result = $row['id'];	
            session_start();
            $_SESSION['login']=$row['login'];

		}
		


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $msg= array("success"=>$result);
    echo json_encode($msg);

?>