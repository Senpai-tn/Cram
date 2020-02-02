<?php
include "../../../Controllers/ConnectionController.php";
try{
		$stmt = $conn->prepare("select * FROM moyen");
	    $stmt->execute();
	   
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    echo ' <table class="table" id="Table_list">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Chiffre</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch()) 
	    {
	    	echo '<tr><td>'.$row["code"].'</td> <td>'.$row["chiffre"].'</td> <td><div class="dropdown">'.
                          '<a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"'.
                          ' aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>'.
                          '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">'.
                            '<a class="dropdown-item" href="" onclick="Update_row_UI('.$row['code'].')" data-toggle="modal"'.
                             'data-target="#modal2" >Modifier</a>'.
                            '<a class="dropdown-item" href="#" data-toggle="modal" onclick=delete_row_UI("'.$row["code"].'")>Supprimer</a>'.
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