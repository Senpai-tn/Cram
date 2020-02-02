<?php
include "../../../Controllers/ConnectionController.php";
include "../../../Models/Event.php";
try{
		$stmt = $conn->prepare("select * FROM evenement");
	    $stmt->execute();
	    $i = 0;
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    echo ' <table class="table" id="Table_list">
                  <thead>
                    <tr>
                      <th>mot clé</th>
                      <th>Groupe de mot clé</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch()) 
	    {
	    	/*$event = new Event($row["nom"],$row["groupe_mot_cle"]);
	    	$event->id_event = $row["id_event"];
	    	$list[$i]=$event;
	    	$i++;
	    	*/
	    	echo '<tr><td>'.$row["nom"].'</td> <td>'.$row["groupe_mot_cle"].'</td> <td><div class="dropdown">'.
                          '<a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"'.
                          ' aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>'.
                          '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">'.
                            '<a class="dropdown-item" href="" onclick="Update_row_UI('.$row['id_event'].')" data-toggle="modal"'.
                             'data-target="#modal2" >Modifier</a>'.
                            '<a class="dropdown-item" href="#" data-toggle="modal" onclick=delete_row_UI("'.$row["id_event"].'")>Supprimer</a>'.
                          '</div>'.
                        '</div></td>  </tr>';
	    	
		}

		echo '</tbody></table>';
    $list="";
}
catch(PDOException $e) {
   $list=$e->getMessage();
}
$msg =  array('error' => $list );
json_encode($msg);

?>