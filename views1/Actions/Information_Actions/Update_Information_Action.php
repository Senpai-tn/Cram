<?php
include "../../../Controllers/ConnectionController.php";


if((isset($_POST['listValidPrestataire']))&&($_POST['listValidPrestataire']!=""))
        $listValidPrestataire = $_POST['listValidPrestataire'];
    else
        $listValidPrestataire = "";

if((isset($_POST['listInvalidPrestataire']))&&($_POST['listInvalidPrestataire']!=""))
    $listInvalidPrestataire = $_POST['listInvalidPrestataire'];
else
    $listInvalidPrestataire = "";
    
if((isset($_POST['listValidC']))&&($_POST['listValidC']!=""))
        $listValidC = $_POST['listValidC'];
    else
        $listValidC="";

if((isset($_POST['listInvalidC']))&&($_POST['listInvalidC']!=""))
        $listInvalidC = $_POST['listInvalidC'];
    else
        $listInvalidC="";


$n_sequence= addslashes($_POST['n_sequence']);
$date_facture = new DateTime();
try {
        $sql = "delete from relation_information_correspondant where  n_sequence='$n_sequence' ";

        // use exec() because no results are returned
        $conn->exec($sql);
        $sql = "delete from relation_information_prestataire where  n_sequence='$n_sequence' ";

        // use exec() because no results are returned
        $conn->exec($sql);
        

        foreach ($listValidC as $key => $value) 
            {
                $sql = "insert into relation_information_correspondant (
                                        n_sequence,
                                        code,
                                        valide,
                                        created_at
                                    )
                                VALUES 
                                    (
                                        '$n_sequence',
                                        '$value',   
                                        '1',
                                        '".$date_facture->format('Y-m-d H:i:s')."'
                )";
            
                $conn->beginTransaction();
                $conn->exec($sql); 
                $conn->commit();

            }
            if($listInvalidC!="")
            {
               foreach ($listInvalidC as $key => $value) 
                {
                    $sql = "insert into relation_information_correspondant (
                                            n_sequence,
                                            code,
                                            valide,
                                            created_at
                                        )
                                    VALUES 
                                        (
                                            '$n_sequence',
                                            '$value',   
                                            '0',
                                            '".$date_facture->format('Y-m-d H:i:s')."'
                    )";
                
                    $conn->beginTransaction();
                    $conn->exec($sql); 
                    $conn->commit();
                }
 
            }
            
            foreach ($listValidPrestataire as $key => $value) {
            $sql = "insert into relation_information_prestataire (
                                    n_sequence,
                                    num_serie,   
                                    created_at,
                                    valide
                                )
                            VALUES 
                                (
                                    '$n_sequence',
                                    '$value',   
                                    '".$date_facture->format('Y-m-d H:i:s')."',
                                    1
            )";
        
            $conn->beginTransaction();
            $conn->exec($sql); 
            $conn->commit();

            } 


            foreach ($listInvalidPrestataire as $key => $value) {
            $sql = "insert into relation_information_prestataire (
                                    n_sequence,
                                    num_serie,   
                                    created_at,
                                    valide
                                )
                            VALUES 
                                (
                                    '$n_sequence',
                                    '$value',   
                                    '".$date_facture->format('Y-m-d H:i:s')."',
                                    0
            )";
        
            $conn->beginTransaction();
            $conn->exec($sql); 
            $conn->commit();

            } 








        $result =  "success";
    

} catch (Exception $e) {
	$result =$e;
}


	$msg = array("success"=>$result);
	echo json_encode($msg);
?>