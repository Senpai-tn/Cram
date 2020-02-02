<?php include '../include/header.php' ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Commerciaux</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1" onclick="select_prestataire('num_serie')">Ajouter commerciaux </a>
            <a class="dropdown-item" href="#" target="_blank" onclick="Export_XLS()">Exporter excel</a>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="content-body">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">liste des commerciaux</h4>
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
              
              
               <div class="table-responsive" id="generer-table">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom & prénom</th>
                      <th>Prestataire</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Départements</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Alex</th>
                      <td>presataire1</td>
                      <td>test@gmail.com</td>
                      <td>900558655</td>
                      <td>86 - Vienne</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" >Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-supp" >Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Alex</th>
                      <td>presataire1</td>
                      <td>test@gmail.com</td>
                      <td>900558655</td>
                      <td>86 - Vienne</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" >Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-supp" >Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Alex</th>
                      <td>presataire1</td>
                      <td>test@gmail.com</td>
                      <td>900558655</td>
                      <td>86 - Vienne</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" >Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-supp" >Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <input type="hidden" name="get_data_code" value="">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>



<div class="modal fade text-left" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Ajouter une commercial</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du commercial</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput2">Nom & prénom :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1"  onkeyup="getCompanyInfo()" class="form-control " placeholder="Nom et prénpm " name="nom">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput1">Prestataires  : </label>
                      <div class="position-relative has-icon-left" >
                        <select id='select_prestataire' name="num_serie" class="select2 form-control" >
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>    
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput3">Email :</label>
                      <div class="position-relative has-icon-left">
                        <input type="email" id="userinput1"  class="form-control " placeholder="Abonnement" name="email">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput3">Téléphone</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="userinput1"  class="form-control " placeholder="Téléphone" name="telephone">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Département : </label>
                        <div class="position-relative has-icon-left">
                            <select class="select2 form-control"   name="departement">
                              <option value="0"></option>
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
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Poste : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userinput1"  class="form-control " placeholder="Poste" name="poste">
                          <div class="form-control-position">
                            <i class="la la-user-secret"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                
              </div>
        </form>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" id="add_commercial" onclick="new_commercial()">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- supprimer -->
<div class="modal fade text-left" id="modal-supp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer commercial</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce commercial ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-success white">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-pencil-square" aria-hidden="true"></i> Modifier client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du commercial</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput2">Nom & prénom :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1"  onkeyup="getCompanyInfo()" class="form-control " placeholder="Numéro de siret" name="new_nom">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput1">Prestataires  : </label>
                      <div class="position-relative has-icon-left" >
                        <select name="new_num_serie" id="select_new_prestataire" class="select2 form-control">
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>    
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput3">Email :</label>
                      <div class="position-relative has-icon-left">
                        <input type="email" id="userinput1"  class="form-control " placeholder="Abonnement" name="new_email">
                        <div class="form-control-position">
                         <i class="ft-mail"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput3">Téléphone</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="userinput1"  class="form-control " placeholder="Téléphone" name="new_telephone">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Département : </label>
                        <div class="position-relative has-icon-left">
                            <select class="select2 form-control" name="new_departement">
                              <option value="0"></option>
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
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Poste : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userinput1"  class="form-control " placeholder="Téléphone" name="new_poste">
                          <div class="form-control-position">
                            <i class="la la-user-secret"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                
              </div>
         </form> 
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" onclick="Confirm_Update()" id="edit-user" class="btn btn-success">Modifier</button>
      </div>
    </div>
  </div>
</div>

<?php include '../include/footer.php' ?>

<script type="text/javascript">
  function select_prestataire(name)
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_Action.php",
        
        success: function(data){
            if(name=='new_num_serie')
              $('#select_new_prestataire').html(data);
            else
              $('#select_prestataire').html(data);
           

            
          
        }
      
    });
}



 function new_commercial()
 {
    var nom = $('input[name=nom]').val();
    var num_serie = $('select[name=num_serie]').val();
    var email = $('input[name=email]').val();
    var telephone = $('input[name=telephone]').val();
    var departement = $('select[name=departement]').val();
    var poste = $('input[name=poste]').val();
  
    
       $.ajax({
        data:{ num_serie: num_serie, 
          nom:nom,
          poste:poste,
          departement:departement,
          email:email,
          telephone:telephone } ,
        type: "post",
        url: "../Actions/Commercial_Actions/Add_Commercial_Action.php",
        dataType:"json",
        success: function(data){
          if(data['success'] == 'success')
          {            
            get_all_data();
            $('#modal1').modal('hide');
            swal("Success","Modification est terminée avec success","success");
          }
          else{
            swal("Erreur","L'opération est echoué, réesseyer ","error");
          }
        }
      });
  }

   $(document).ready(function(){

      get_all_data();  
  });

function get_all_data(){
    $.ajax({
        type:"POST",
        url: "../Actions/Commercial_Actions/List_Commercial_Action.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
    
    });
  }


  function get_one_Commercial(code){
        $.ajax({
            type:"POST",
            url: "../Actions/Commercial_Actions/Get_Commercial_Action.php",
            data:{code:code},
            dataType:"json",
            success: function(data){
                if(data['success'] != null)
                {
                  $('input[name=get_data_code').val(code);

                  $('input[name=new_nom]').val(data['success']['nom']);
                  $('input[name=new_email]').val(data['success']['email']);
                  $('input[name=new_telephone]').val(data['success']['telephone']);
                  $('select[name=new_departement]').val(data['success']['departement']);
                  $('input[name=new_poste]').val(data['success']['poste']);
                  $('select[name=new_num_serie]').val(data['success']['num_serie']);
                }
              }
        });
  }

  function Update_row_UI(code)
{
  get_one_Commercial(code);
  $('#modal-edit').modal('show');
  select_prestataire('new_num_serie');
}


function Confirm_Update()
  {

    var code = $('input[name=get_data_code]').val();
    var new_nom = $('input[name=new_nom]').val();
    var new_email = $('input[name=new_email]').val();
    var new_telephone = $('input[name=new_telephone]').val();
    var new_departement = $('select[name=new_departement]').val();
    var new_poste = $('input[name=new_poste]').val();
    var new_num_serie = $('select[name=new_num_serie]').val();

    $.ajax({
                type:"POST",
                url: "../Actions/Commercial_Actions/Update_Commercial_Action.php",
                data:{
                  new_email:new_email,
                  new_nom:new_nom,
                  new_telephone:new_telephone,
                  new_departement:new_departement,
                  new_poste:new_poste,
                  new_num_serie:new_num_serie,
                  code:code

                },
                dataType:"json",
                success: function(data){
                  if (data['success'] ==  'success'){
                    get_all_data();
                      $('#modal-edit').modal('hide');
                      
                      swal("Success","Modification est terminée avec success","success");
                  }else {
                      swal("Erreur","L'opération est echoué , réesseyer ","error");
                  }


                }

            });

  }

  function delete_row_UI(id)
  {
    $('#modal-supp').modal('show');
    $('input[name=get_data_code').val(id);   
  }

  function confirmDelete()
  {
    var code = $('input[name=get_data_code').val();
    $.ajax({
            type:"POST",
            url: "../Actions/Commercial_Actions/Delete_Commercial_Action.php",
            data: { code:code } ,
            dataType:"json",
            success: function(data){
              if (data['success'] ==  'success'){
                  get_all_data();
                  $('#modal-supp').modal('hide'); 
                  swal("Success","Suppression est terminée avec success","success");   
              }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
              }
            }
        });
  }

  function Export_XLS(){  
      
          var excel_data = encodeURIComponent($('#generer-table').html());  
          location.replace("../Actions/Exel_Maker/Commercial.php");          
 }
</script>
