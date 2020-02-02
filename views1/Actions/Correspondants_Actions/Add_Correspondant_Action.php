
<?php 
include "../../../Controllers/ConnectionController.php";
$code=addslashes($_POST['code']);
$nom=addslashes($_POST['nom']);
$adresse=addslashes($_POST['adresse']);
$code_postal=addslashes($_POST['code_postal']);
$email=addslashes($_POST['email']);
$telephone=addslashes($_POST['telephone']);
$etat=addslashes($_POST['etat']);
$prix=addslashes($_POST['prix']);
$ville = addslashes($_POST['ville']);
if($code_postal=='')
{
	$code_postal=0;
	$departement = null;
}
else
	$departement = $code_postal[0].$code_postal[1];

if($telephone=="")
        $telephone=0;

if($prix=="")
    $prix=0;

	try
	{	
		
	 	$sql = "insert into correspondant 
        VALUES ('$code',
				'$nom',
				'$adresse',
				'$code_postal',
				'$email',
				$telephone,
				'$etat',
				'$prix',
				'$departement',
				'$ville'
			)";
        // use exec() because no results are returned
        $conn->exec($sql); 
        $result =  "success";
    }
    catch(PDOException $e)
    {
   		 $result =$e->getMessage();
    }
        
       $msg= array("success"=>$result);
    echo json_encode($msg);
?>