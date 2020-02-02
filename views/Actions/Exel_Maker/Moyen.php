
 <?php  
  
  header('Content-Type: application/vnd.ms-excel');  
  header('Content-disposition: attachment; filename=moyen'.rand().'.xls'); 
  
  ?>


<?php
include "../../../Controllers/ConnectionController.php";
try{
		$stmt = $conn->prepare("select * FROM moyen");
	    $stmt->execute();
	   
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $data= ' <table class="table" id="Table_list">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Chiffre</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch()) 
	    {
	    	$data.= '<tr>
                  <td>'.$row["code"].'</td> 
                  <td>'.$row["chiffre"].'</td> 
                </tr>';
	    	
		}

		$data.= '</tbody></table>';
    

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

echo $data;


?>