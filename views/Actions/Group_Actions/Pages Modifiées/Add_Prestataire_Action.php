<?php 
include "../../../Controllers/ConnectionController.php";
    $num_serie=addslashes($_POST['num_serie']);
    $raison_sociale=addslashes($_POST['raison_sociale']);
    $adresse=addslashes($_POST['adresse']);
    $code_postal=addslashes($_POST['code_postal']);
    $abonnement=addslashes($_POST['abonnement']);
    $telephone=addslashes($_POST['telephone']);
    $departement=$_POST['departement'];
    
    $honoraire=addslashes($_POST['honoraire']);
    $commentaire=addslashes($_POST['commentaire']);
    $code_moyen=addslashes($_POST['code_moyen']);
    $etat=addslashes($_POST['etat']);
    $ville=addslashes($_POST['ville']);
	$street_number = addslashes($_POST['street_number']);

    if($code_postal=="")
        $code_postal=0;

    if($telephone=="")
        $telephone=0;

    if($honoraire=="")
        $honoraire=0;

    if($abonnement=="")
        $abonnement=0;
    
	try
	{	
		
	 	$sql = "insert into prestataire (`num_serie`, `raison_sociale`, `adresse`, `code_postal`, `abonnement`, `telephone`, `etat`, `commentaire`,  `code_moyen`, `honoraire`, `nbr_signalement_payee`,`ville`,`street_number`)
        VALUES (
                '$num_serie',
                '$raison_sociale',
                '$adresse',
                '$code_postal',
                '$abonnement',
                '$telephone',
                '$etat',
                '$commentaire',
               
                '$code_moyen',
                '$honoraire',
                '0',
                '$ville',
				'$street_number'
    )";
   
        // use exec() because no results are returned
        $conn->exec($sql); 

        $listD = explode(",",$departement);
        for ($i=0; $i < sizeof($listD); $i++) 
        { 
            $dep = (Int) $listD[$i];
            $sql = "insert INTO `departement` (`num_serie`, `departement`) VALUES ( '$num_serie', '".$dep."');
            )";
   
        // use exec() because no results are returned
        $conn->exec($sql); 

        }
        $result = 'success';
    }
    catch(PDOException $e)
    {
   		 $result =$e->getMessage();
    }

    $msg= array("success"=>$result);
    echo json_encode($msg);
        
       
?>