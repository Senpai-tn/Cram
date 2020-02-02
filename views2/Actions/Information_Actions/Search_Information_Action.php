<?php
include "../../../Controllers/ConnectionController.php";

$code_m = $_POST['code_m'];
$begin_date = $_POST['begin_date'];
$end_date = $_POST['end_date'];
$code_c = $_POST['code_c'];


try{
      $stmt = $conn->prepare("select * from 
                    information as I ,
                    relation_information_correspondant as RIC
                    WHERE I.n_sequence = RIC.n_sequence 
                    and RIC.valide = '0' 
                    and RIC.code = '$code_c'
                    and I.code = '$code_m' 
                    and date_facture BETWEEN '".$begin_date."-01 00:00:00' AND '".$end_date."-31 23:59:00'  ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      echo ' <div class="col-md-6">
                    <h4 class="card-title" id="basic-layout-icons">Non validée</h4>
                    <div class="table-responsive" >
                      <table class="table">
                        <thead>
                          <tr>
                            <th>periode 1</th>
                            <th>Code Correspondant</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>';

      while ($row = $stmt->fetch()) 
      {
        echo '<tr>
                
                <td>'.$row['date_facture'].'</td>
                <td>'.$row['code'].'</td>
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

    echo '</tbody>
                      </table>
                    </div>
                </div>';
  

$stmt = $conn->prepare("select * from 
                    information as I ,
                    relation_information_correspondant as RIC
                    WHERE I.n_sequence = RIC.n_sequence 
                    and RIC.valide = '1' 
                    and RIC.code = '$code_c'
                    and I.code = '$code_m' 
                    and date_facture BETWEEN '".$begin_date."-01 00:00:00' AND '".$end_date."-31 23:59:00'  
                    group by RIC.n_sequence
                    ");
      $stmt->execute();
      
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      echo ' <div class="col-md-6">
                    <h4 class="card-title" id="basic-layout-icons">Validée</h4>
                    <div class="table-responsive" >
                      <table class="table">
                        <thead>
                          <tr>
                            <th>période</th>
                             <th>Code Correspondant</th>
                           
                          </tr>
                        </thead>
                        <tbody>';

      while ($row = $stmt->fetch()) 
      {
        echo '<tr>
                <td>'.$row['date_facture'].'</td>
                <td>'.$row['code'].'</td>
                
              </tr>';
        
    }

    echo ' </tbody>
                      </table>
                    </div>
                </div>';
   

}
catch(PDOException $e) {
   
}




?>




                          
                         
                        
                
                       
                         
                       