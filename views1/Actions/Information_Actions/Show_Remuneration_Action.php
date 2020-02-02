
<?php
	include "../../../Controllers/ConnectionController.php";
	$begin_date = $_POST['begin_date'];
	$end_date = $_POST['end_date'];

	$begin_date = new DateTime($begin_date);
	$end_date = new DateTime($end_date);
	try{
      $stmt = $conn->prepare("select  * , GROUP_CONCAT(C.nom) as listC from 
                    information as I ,
                    relation_information_correspondant as RIC,
                    correspondant as C
                    WHERE I.n_sequence = RIC.n_sequence
                    and C.code = RIC.code
                    and RIC.valide = 0
                   	and date_facture BETWEEN '".$begin_date->format('Y-m-d')."' AND '".$end_date->format('Y-m-d')."' 
                    GROUP BY I.n_sequence");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      	echo '<div class="col-md-6">
                    <h4 class="card-title" id="basic-layout-icons">Non validée</h4>
                    <div class="table-responsive" id="generer-table">
                      <table class="table" >
                        <thead>
                          <tr>
                          <th>N° Séquence </th>
                            <th>correspondants</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>';

        while ($row = $stmt->fetch()) 
     	 {
     	 	$list = explode(",",$row['listC']);
        echo '<tr> 
        					<td>'.$row['n_sequence'].'
                            <td>';
                            for ($i=0; $i < sizeof($list) ; $i++) { 
                             	echo '<div class="badge badge-primary">'.$list[$i].'</div>';
                             }
                              

                            echo '</td>
                            <td>
                              <div class="dropdown">
                                <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Modifier</a>
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Supprimer</a>
                                </div>
                              </div>
                            </td>
                          </tr>';

            }

            echo '   </tbody>
                      </table>
                    </div>
                </div>';

                   
                    
                    
                          
                     
                 $stmt = $conn->prepare("select  * , GROUP_CONCAT(C.nom) as listC from 
                    information as I ,
                    relation_information_correspondant as RIC,
                    correspondant as C
                    WHERE I.n_sequence = RIC.n_sequence
                    and C.code = RIC.code
                    and RIC.valide = 1
                   	and date_facture BETWEEN '".$begin_date->format('Y-m-d')."' AND '".$end_date->format('Y-m-d')."' 
                    GROUP BY I.n_sequence");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      	echo '<div class="col-md-6">
                    <h4 class="card-title" id="basic-layout-icons">Validée</h4>
                    <div class="table-responsive" id="generer-table">
                      <table class="table">
                        <thead>
                          <tr>
                          	<th>N° Séquence </th>
                            <th>correspondants</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>';

        while ($row = $stmt->fetch()) 
     	 {
        $list = explode(",",$row['listC']);
        echo '<tr> 
        					<td>'.$row['n_sequence'].'
                            <td>';
                            for ($i=0; $i < sizeof($list) ; $i++) { 
                             	echo '<div class="badge badge-primary">'.$list[$i].'</div>';
                             }
                              

                            echo '</td>
                            <td>
                              <div class="dropdown">
                                <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Modifier</a>
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Supprimer</a>
                                </div>
                              </div>
                            </td>
                          </tr>';
            }

            echo '   </tbody>
                      </table>
                    </div>
                </div>';
            }
catch(PDOException $e) {
   
}




?>