<?php include "../include/header.php" ?>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Statistiques</h3>
    </div>
    <!-- <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter type de facture </a>
          </div>
        </div>
      </div>
    </div> -->
</div>


<div class="content-body container">
  <div class="row match-height justify-content-md-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-icons">Statistiques</h4>
          <a class="heading-elements-toggle">
            <i class="la la-ellipsis-v font-medium-3"></i>
          </a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li>
                <a data-action="collapse">
                  <i class="ft-minus"></i>
                </a>
              </li>
              <li>
                <a data-action="reload">
                  <i class="ft-rotate-cw"></i>
                </a>
              </li>
              <li>
                <a data-action="expand">
                  <i class="ft-maximize"></i>
                </a>
              </li>
              <li>
                <a data-action="close">
                  <i class="ft-x"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">

            <form class="form">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Date de début:</label>
                      <div class="position-relative has-icon-left">
                        <input type="month" id="userinput1" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="Date de début" id="begin_date" name="begin_date">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                </div>
                </div>    
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="timesheetinput2">Date de fin :</label>
                        <div class="position-relative has-icon-left">
                          <input type="month" id="userinput1" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="Date de fin" name="end_date" id="end_date">
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="timesheetinput1">Département : </label>
                        <div class="position-relative has-icon-left">
                            <select class="select2 form-control" id="aa2" multiple="multiple">
                                <option value="01">01 - Ain</option>
                              <option value="02">02 - Aisne</option>
                              <option value="03">03 - Allier</option>
                              <option value="04">04 - Alpes-de-Haute-Provence</option>
                              <option value="05">05 - Hautes-Alpes</option>
                              <option value="06">06 - Alpes-Maritimes</option>
                              <option value="07">07 - Ardèche</option>
                              <option value="08">08 - Ardennes</option>
                              <option value="09">09 - Ariège</option>
                              <option value="10">10 - Aube</option>
                              <option value="11">11 - Aude</option>
                              <option value="12">12 - Aveyron</option>
                              <option value="13">13 - Bouches-du-Rhône</option>
                              <option value="14">14 - Calvados</option>
                              <option value="15">15 - Cantal</option>
                              <option value="16">16 - Charente</option>
                              <option value="17">17 - Charente-Maritime</option>
                              <option value="18">18 - Cher</option>
                              <option value="19">19 - Corrèze</option>
                              <option value="2A">2A - Corse-du-Sud</option>
                              <option value="2B">2B - Haute-Corse</option>
                              <option value="21">21 - Côte-d'Or</option>
                              <option value="22">22 - Côtes-d'Armor</option>
                              <option value="23">23 - Creuse</option>
                              <option value="24">24 - Dordogne</option>
                              <option value="25">25 - Doubs</option>
                              <option value="26">26 - Drôme</option>
                              <option value="27">27 - Eure</option>
                              <option value="28">28 - Eure-et-Loir</option>
                              <option value="29">29 - Finistère</option>
                              <option value="30">30 - Gard</option>
                              <option value="31">31 - Haute-Garonne</option>
                              <option value="32">32 - Gers</option>
                              <option value="33">33 - Gironde</option>
                              <option value="34">34 - Hérault</option>
                              <option value="35">35 - Ille-et-Vilaine</option>
                              <option value="36">36 - Indre</option>
                              <option value="37">37 - Indre-et-Loire</option>
                              <option value="38">38 - Isère</option>
                              <option value="39">39 - Jura</option>
                              <option value="40">40 - Landes</option>
                              <option value="41">41 - Loir-et-Cher</option>
                              <option value="42">42 - Loire</option>
                              <option value="43">43 - Haute-Loire</option>
                              <option value="44">44 - Loire-Atlantique</option>
                              <option value="45">45 - Loiret</option>
                              <option value="46">46 - Lot</option>
                              <option value="47">47 - Lot-et-Garonne</option>
                              <option value="48">48 - Lozère</option>
                              <option value="49">49 - Maine-et-Loire</option>
                              <option value="50">50 - Manche</option>
                              <option value="51">51 - Marne</option>
                              <option value="52">52 - Haute-Marne</option>
                              <option value="53">53 - Mayenne</option>
                              <option value="54">54 - Meurthe-et-Moselle</option>
                              <option value="55">55 - Meuse</option>
                              <option value="56">56 - Morbihan</option>
                              <option value="57">57 - Moselle</option>
                              <option value="58">58 - Nièvre</option>
                              <option value="59">59 - Nord</option>
                              <option value="60">60 - Oise</option>
                              <option value="61">61 - Orne</option>
                              <option value="62">62 - Pas-de-Calais</option>
                              <option value="63">63 - Puy-de-Dôme</option>
                              <option value="64">64 - Pyrénées-Atlantiques</option>
                              <option value="35">65 - Hautes-Pyrénées</option>
                              <option value="66">66 - Pyrénées-Orientales</option>
                              <option value="67">67 - Bas-Rhin</option>
                              <option value="68">68 - Haut-Rhin</option>
                              <option value="69">69 - Rhône</option>
                              <option value="70">70 - Haute-Saône</option>
                              <option value="71">71 - Saône-et-Loire</option>
                              <option value="72">72 - Sarthe</option>
                              <option value="73">73 - Savoie</option>
                              <option value="74">74 - Haute-Savoie</option>
                              <option value="75">75 - Paris</option>
                              <option value="76">76 - Seine-Maritime</option>
                              <option value="77">77 - Seine-et-Marne</option>
                              <option value="78">78 - Yvelines</option>
                              <option value="79">79 - Deux-Sèvres</option>
                              <option value="80">80 - Somme</option>
                              <option value="81">81 - Tarn</option>
                              <option value="82">82 - Tarn-et-Garonne</option>
                              <option value="83">83 - Var</option>
                              <option value="84">84 - Vaucluse</option>
                              <option value="85">85 - Vendée</option>
                              <option value="86">86 - Vienne</option>
                              <option value="87">87 - Haute-Vienne</option>
                              <option value="88">88 - Vosges</option>
                              <option value="89">89 - Yonne</option>
                              <option value="90">90 - Territoire de Belfort</option>
                              <option value="91">91 - Essonne</option>
                              <option value="92">92 - Hauts-de-Seine</option>
                              <option value="93">93 - Seine-Saint-Denis</option>
                              <option value="94">94 - Val-de-Marne</option>
                              <option value="95">95 - Val-d'Oise</option>
                            </select>
                        </div>
                      </div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="timesheetinput2">Moyen hydraulique :</label>
                        <div class="position-relative has-icon-left">
                          <select class="select2 form-control" id="select_moyen" name="code_m">
                                
                            </select>
                        </div>
                      </div>
                  </div>
                </div> 

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="timesheetinput2">correspondant :</label>
                        <div class="position-relative has-icon-left">
                          <select class="select2 form-control" id="select_correspondant" name="code_c">
                                
                            </select>
                        </div>
                      </div>
                  </div>
                </div> 

               
              </div>

              <div class="form-actions right">
                        <button type="reset" class="btn btn-danger mr-1">
                          <i class="ft-x"></i> Annuler
                        </button>
                        <button type="button" id="add-user" onclick="search();" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Recherche
                        </button>
                      </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- resultat -->
<div class="content-body" id="resultats">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Liste des informations :</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload" onclick="get_all_data()"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              
              
              <div class="row" id="generer-table">

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


<!-- supprimer -->
<div class="modal fade text-left" id="modal3" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer type de facture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet type de facture ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="delete_row();">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5">Modifier un type de facture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Type :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1" onblur="verifChaine('nom',5,'add-user')" class="form-control " placeholder="nom et prenom" name="nom">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="delete_row();">Modifier</button>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php" ?>


<script type="text/javascript">

function select_moy()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Moyen_Actions/Select_Moyen_Action.php",
        
        success: function(data){
            
              $('#select_moyen').html(data); 
        }
      
    });
}


function select_correspondant()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Correspondants_Actions/Select_Correspondat_Action.php",
        
        success: function(data){
           
             $('#select_correspondant').html(data);
             

        }
      
    });
  
}
function search()
{
  
  var begin_date = $('input[name=begin_date]').val();
  var end_date = $('input[name=end_date]').val();
  var code_m = $('select[name=code_m]').val();
  var code_c = $('select[name=code_c]').val();
  var departement ;
  
  $.ajax({
        type:"POST",
        data:{
          code_m:code_m,
          begin_date:begin_date,  
          end_date:end_date,
          code_c:code_c
        },
        url: "../Actions/Information_Actions/Search_Information_Action.php",
        success: function(data)
        {
           
              $('#generer-table').html(data);
  
        }
      });

}
$(document).ready(function(){
select_moy();
select_correspondant();
});


</script>