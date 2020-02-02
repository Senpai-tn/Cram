

<?php
include "../../../Controllers/ConnectionController.php";


try{

      

      $stmt = $conn->prepare("select  CAST(departement AS UNSIGNED) as dep,GROUP_CONCAT(DISTINCT raison_sociale) as ListP FROM `departement` as D , prestataire as P where P.num_serie = D.num_serie GROUP by  dep
");
      $stmt->execute();
      $departement = array(   "Ain",
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
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $days =array("lundi", "mardi", "mercredi","jeudi","vendredi","samedi","dimanche");
      $date = new DateTime('Europe/London');
      $i=(int)$date->format('N');
      
      echo '<table class="table">
                  <thead>
                    <tr>
                      <th>Départements</th>
                      <th>Prestataires</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
		 while ($row = $stmt->fetch()) 
			    {
			    	$ListP = explode(",",$row['ListP']);
            $listD = explode(",",$row['dep']);
            for ($i=0; $i < sizeof($listD); $i++) 
            {            
                  if((float)$listD[$i]>0)
                  {
  			    	echo ' <tr>
                        <td>'.$listD[$i].' '.$departement[(float)$listD[$i]-1].'</td>
                        <td>';
            
                      for ($j=0; $j < sizeof($ListP) ; $j++) 	
                      {
                          echo '<div class="badge badge-primary">'.$ListP[$j].'</div>';
                      }
                  }
                  
            }          
          }
}
catch(PDOException $e) {
   $list=$e->getMessage();
}



?>


