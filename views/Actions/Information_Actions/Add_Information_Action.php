<?php 
include "../../../Controllers/ConnectionController.php";
require '../../../vendor/messagebird/php-rest-api/autoload.php';
require 'class/class.phpmailer.php';


    $date = addslashes($_POST['date']);
    $hour = addslashes($_POST['hour']); 
    $code  = addslashes($_POST['code']);
    $id_event = addslashes($_POST['id_event']);
    //$listGroup = $_POST['listGroup'];
    $adresse = addslashes($_POST['adresse']);
    $code_postal = addslashes($_POST['code_postal']);
    $ville = addslashes($_POST['ville']);
    $commentaire = addslashes($_POST['commentaire']);
    $n_sequence = addslashes($_POST['n_sequence']);
	
	$adresse_google ='';
	if(isset($_POST['adresse_google']))
        $adresse_google = addslashes($_POST['adresse_google']);
	else
		$adresse_google = $adresse;
	
	$link_adresse_google ='';
	if(isset($_POST['link_adresse']))
        $link_adresse_google = addslashes($_POST['link_adresse']);
	else
		$link_adresse_google = $adresse;
 
    if(isset($_POST['listPrestataire']))
        $listPrestataire = $_POST['listPrestataire'];
    else
        $listPrestataire = null;

    if(isset($_POST['listInvalidC']))
        $listInvalidC = $_POST['listInvalidC'];
    else
        $listInvalidC=null;

    if(isset($_POST['listValidC']))
        $listValidC = $_POST['listValidC'];
    else
        $listValidC=null;

    $date.=' '.$hour;
    $date_facture = new DateTime($date);

	try
	{	
		
	 	$sql = "insert into information (
                                            n_sequence,
                                            date_facture,
                                            adresse,
                                            code_postal,
                                            ville,
                                            commentaire,
                                            code,
                                            id_event
        )
        VALUES (
                    '$n_sequence',
                    '".$date_facture->format('Y-m-d H:i:s')."', 
                    '$adresse',
                    '$code_postal',
                    '$ville',
                    '$commentaire',
                    '$code',
                    '$id_event'
                )";
        // use exec() because no results are returned
        $conn->beginTransaction();
        $conn->exec($sql); 
        
        $conn->commit();

       if(!(is_null($listValidC)))
       {
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
       }
        

        if(!(is_null($listInvalidC)))
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
        


        if(!(is_null($listPrestataire)))
        {
            foreach ($listPrestataire as $key => $value) 
            {
            $sql = "insert into relation_information_prestataire (
                                    n_sequence,
                                    num_serie,   
                                    created_at
                                )
                            VALUES 
                                (
                                    '$n_sequence',
                                    '$value',   
                                    '".$date_facture->format('Y-m-d H:i:s')."'
            )";
        
            $conn->beginTransaction();
            $conn->exec($sql); 
            $conn->commit();

            } 
        }

        $moyen_hydrolique = '';
        
            $stmt = $conn->prepare("select * FROM moyen where code = '$code'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) 
            {
                $moyen_hydrolique = $row['chiffre'];   
            }
        
            
        

        $evenement ='';
        
           $stmt = $conn->prepare("select * FROM evenement where id_event = '$id_event'");
           $stmt->execute();
           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
           while ($row = $stmt->fetch()) 
           {
               $evenement = $row["nom"];
           }
        
        

        /*
        $MessageBird = new \MessageBird\Client('kx9GUUBML671Ymj1aWT6GTQLI');
        $Message = new \MessageBird\Objects\Message();
        $Message->originator = +21693033093;
        $Message->recipients = array(+21693033093);
        $Message->body = 'MESSAGE';

        $MessageBird->messages->create($Message);
        */


        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'SSL0.OVH.NET';                 //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';                            //Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'zied@bens-development.com';                           //Sets SMTP username
        $mail->Password = 'VecTra1987';                           //Sets SMTP password
        $mail->SMTPSecure = 'ssl';                      //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'zied@digi-dev.net';        //Sets the From email address for the message
        $mail->FromName = 'CRAM';                     //Sets the From name of the message
        $mail->AddAddress('khaledsahli36@gmail.com', 'Logiciel Cram');   //Adds a "To" address
        //$mail->AddCC($_POST["email"], $_POST["name"]);    //Adds a "Cc" address
        
        $mail->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                           //Sets message type to HTML             
        $mail->Subject = 'Creation information';                     //Sets the Subject of the message
        $mail->Body = '<br>'.$evenement.'</br><br>'.$moyen_hydrolique.'</br><br>'.$adresse_google.'</br><br>'.$link_adresse_google.'</br>';
        if($mail->Send())
            $result = 'success'; 
        else 
            $result = 'error';

            

		
		
    }
    catch(PDOException $e)
    {
   		 $result =$e->getMessage();
    }



    $msg= array("success"=>$result);
    echo json_encode($msg);
        
       
?>