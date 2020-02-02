<?php
include "../../../Controllers/ConnectionController.php";
try{
  $departement = array("Ain",
                              "Aisne",
                              "Allier",
                              "Alpes-de-Haute-Provence",
                              "Hautes-Alpes",
                              "Alpes-Maritimes",
                              "Ardèche",
                              "Ardennes",
                              "Ariège",
                              "Aube",
                              "Aude",
                              "Aveyron",
                              "Bouches-du-Rhône",
                              "Calvados",
                              "Cantal",
                              "Charente",
                              "Charente-Maritime",
                              "Cher",
                              "Corrèze",
                              "Corse-du-Sud",
                              "Haute-Corse",
                              "Côte-d'Or",
                              "Côtes-d'Armor",
                              "Creuse",
                              "Dordogne",
                              "Doubs",
                              "Drôme",
                              "Eure",
                              "Eure-et-Loir",
                              "Finistère",
                              "Gard",
                              "Haute-Garonne",
                              "Gers",
                              "Gironde",
                              "Hérault",
                              "Ille-et-Vilaine",
                              "Indre",
                              "Indre-et-Loire",
                              "Isère",
                              "Jura",
                              "Landes",
                              "Loir-et-Cher",
                              "Loire",
                              "Haute-Loire",
                              "Loire-Atlantique",
                              "Loiret",
                              "Lot",
                              "Lot-et-Garonne",
                              "Lozère",
                              "Maine-et-Loire",
                              "Manche",
                              "Marne",
                              "Haute-Marne",
                              "Mayenne",
                              "Meurthe-et-Moselle",
                              "Meuse",
                              "Morbihan",
                              "Moselle",
                              "Nièvre",
                              "Nord",
                              "Oise",
                              "Orne",
                              "Pas-de-Calais",
                              "Puy-de-Dôme",
                              "Pyrénées-Atlantiques",
                              "Hautes-Pyrénées",
                              "Pyrénées-Orientales",
                              "Bas-Rhin",
                              "Haut-Rhin",
                              "Rhône",
                              "Haute-Saône",
                              "Saône-et-Loire",
                              "Sarthe",
                              "Savoie",
                              "Haute-Savoie",
                              "Paris",
                              "Seine-Maritime",
                              "Seine-et-Marne",
                              "Yvelines",
                              "Deux-Sèvres",
                              "Somme",
                              "Tarn",
                              "Tarn-et-Garonne",
                              "Var",
                              "Vaucluse",
                              "Vendée",
                              "Vienne",
                              "Haute-Vienne",
                              "Vosges",
                              "Yonne",
                              "Territoire de Belfort",
                              "Essonne",
                              "Hauts-de-Seine",
                              "Seine-Saint-Denis",
                              "Val-de-Marne",
                              "Val-d'Oise");
		  $stmt = $conn->prepare("select *,GROUP_CONCAT(DISTINCT D.departement) as dep FROM prestataire as P , departement as D where P.num_serie = D.num_serie  GROUP by P.num_serie");
	    $stmt->execute();
	               

	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    echo ' <table class="table" id="Table_list">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Etat</th>
                      <th>Raison social</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>honoraire</th>
                      <th>Téléphone</th>
                      <th>Départements</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	    while ($row = $stmt->fetch()) 
	    {
			$variable = number_format($row['honoraire'], 2);
    
	    	echo '<tr>
                <td>'.$row["num_serie"].'</td> 
                <td>';
                if($row["etat"]=='passif')
                  echo '<span class="badge badge-danger">Passif</span>';
                else
                  echo '<span class="badge badge-success">Actif</span>';
                echo '</td> 
                <td>'.$row['raison_sociale'].'</td>
                <td>'.$row['adresse'].'</td>
                <td>'.$row['code_postal'].'</td>
                <td>'.$row['ville'].'</td>
                <td>'.$variable.'</td>
                <td>'.$row['telephone'].'</td><td>';
                $departements = explode(",",$row['dep']); 
                for ($i=0; $i < sizeof($departements) ; $i++) { 
                  if((float)$departements[$i]>0)
                  echo '<div class="badge badge-primary" >'.$departement[(float)$departements[$i]].'</div>';
                }
                
                
                echo '</td><td><div class="dropdown">'.
                          '<a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"'.
                          ' aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>'.
                          '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">'.
                            '<a class="dropdown-item" href="" onclick="Update_row_UI('.$row['num_serie'].');select_departement('.$row['num_serie'].');" data-toggle="modal"'.
                             'data-target="#modal2" >Modifier</a>'.
                            '<a class="dropdown-item" href="#" data-toggle="modal" onclick=delete_row_UI("'.$row["num_serie"].'")>Supprimer</a>'.
                          '</div>'.
                        '</div></td>  </tr>';
	    	
		}

		echo '</tbody></table>';
    $list="";

}
catch(PDOException $e) {
   $list=$e->getMessage();
}

$msg =  array('success' => $list );
json_encode($msg);


?>