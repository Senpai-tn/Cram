<?php include "../include/header.php" ?>

<style>
.pac-container {
    z-index: 1051 !important;
}
</style>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Prestataires de services</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1" onclick="select_moy('code_moyen')">Ajouter prestataire </a>
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
            <h4 class="card-title">liste des prestataires de services</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              
              
               <div class="table-responsive" id="generer-table">
                
              </div>
              <input type="text" hidden  name="get_data_num_serie" value="">

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
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Ajouter une prestataire</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du prestataire</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="num_serie">Numéro de siret :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="num_serie"  onkeyup="getCompanyInfo()" class="form-control " placeholder="Numéro de siret" name="num_serie">
                        <div class="form-control-position">
                          <i class="la la-barcode"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="raison_sociale">Raison social :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="raison_sociale" class="form-control" placeholder="Raison social" name="raison_sociale">
                        <div class="form-control-position">
                          <i class="la la-barcode"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="timesheetinput2">Recherche d'adresse google</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="autocomplete_google" class="form-control " placeholder="Adresse" name="adresse_google" autocomplete="off">
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                          <label for="timesheetinput2">N° :</label>
                          <div class="position-relative has-icon-left">
                            <input type="number" id="street_number" class="form-control " placeholder="N°" name="n">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="form-group">
                          <label for="timesheetinput2">Adresse :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id='route' class="form-control " placeholder="Adresse" name="adresse" >
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                                <label for="timesheetinput2">Code postal :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="text" id='postal_code'  class="form-control " placeholder="Code postal" name="code_postal">
                                  <div class="form-control-position">
                                    <i class="ft-user"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                  <input type="hidden" id='administrative_area_level_1'/>
                  <input type="hidden" id='country'/>
                  <input type="hidden" id='voie' class="form-control " placeholder="Voie" name="voie">
                  <div class="col-md-6">
                    <div class="form-group">
                                <label for="timesheetinput2">Ville :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="text" id='locality' onblur="verifChaine('ville',3,'add-user')" class="form-control " placeholder="Ville" name="ville">
                                  <div class="form-control-position">
                                    <i class="ft-user"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                </div>    

                <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="abonnement">Abonnement :</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="abonnement" class="form-control " placeholder="Abonnement" name="abonnement">
                        <div class="form-control-position">
                          <i class="la la-navicon"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput12">Téléphone</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="userinput12"  class="form-control " placeholder="Téléphone" name="telephone">
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
                        <label for="departement">Département : </label>
                        <div class="position-relative has-icon-left">
                            <select class="select2 form-control"  name="departement" multiple="multiple">
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
                        <label for="select_moyen">Moyen hydraulique : </label>
                        <div class="position-relative has-icon-left" > 
                          <select name="code_moyen" id='select_moyen' class="select2 form-control" ></select>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
				              <div class="form-group">
                        <label for="timesheetinput1">Etat :</label>
                        <div class="position-relative has-icon-left">
                          <select name="etat" class="form-control">
                              <option value="actif">Actif</option>
                              <option value="passif">Passif</option>
                          </select>
                          <div class="form-control-position">
                            <i class="la la-navicon"></i>
                          </div>
                        </div>
                      </div>
                      
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput12">Honoraire : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="timesheetinput12"  class="form-control " placeholder="Honoraire" name="honoraire">
                          <div class="form-control-position">
                            <i class="la la-navicon"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="timesheetinput1">Commentaire :</label>
                        <div class="position-relative has-icon-left">
                          <textarea class="form-control"  rows="5" name="commentaire"></textarea>
                        </div>
                      </div>
                  </div>
                </div>

              </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="Add_Prestataire();">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- supprimer -->
<div class="modal fade text-left" id="modal-supp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer prestataire</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce prestataire ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" onload="select_moyen()" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-success white">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-pencil-square" aria-hidden="true"></i> Modifier client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du prestataire</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="num_serie">Numéro de siret :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="num_serie"  onkeyup="getCompanyInfo()" class="form-control " placeholder="Numéro de siret" name="new_num_serie">
                        <div class="form-control-position">
                          <i class="la la-barcode"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="raison_sociales">Raison social :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="raison_sociales"  class="form-control " placeholder="Raison social" name="new_raison_sociale">
                        <div class="form-control-position">
                          <i class="la la-barcode"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="timesheetinput2">Recherche d'adresse google</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id='autocomplete2' class="form-control " placeholder="Adresse" name="new_adresse_google" autocomplete="off">
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                          <label for="timesheetinput2">N° :</label>
                          <div class="position-relative has-icon-left">
                            <input type="number" id="new_street_number" class="form-control " placeholder="N°" name="new_n">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="form-group">
                          <label for="timesheetinput2">Adresse :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id='new_route' class="form-control " placeholder="Adresse" name="new_adresse" >
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                                <label for="timesheetinput2">Code postal :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="text" id='new_postal_code'  class="form-control " placeholder="Code postal" name="new_code_postal">
                                  <div class="form-control-position">
                                    <i class="ft-user"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                  <div class="col-md-6">
				  <input type="hidden" id='new_administrative_area_level_1'/>
                  <input type="hidden" id='new_country'/>
                  <input type="hidden" id='new_voie' class="form-control " placeholder="Voie" name="voie">
                    <div class="form-group">
                                <label for="timesheetinput2">Ville :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="text" id='new_locality' onblur="verifChaine('ville',3,'add-user')" class="form-control " placeholder="Ville" name="new_ville">
                                  <div class="form-control-position">
                                    <i class="ft-user"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                </div>    

                <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="abonnement">Abonnement :</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="abonnement"  class="form-control " placeholder="Abonnement" name="new_abonnement">
                        <div class="form-control-position">
                          <i class="la la-navicon"></i>
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
                        <label for="departement">Département : </label>
                        <div class="position-relative has-icon-left">
                            <select class="select2 form-control" id="new_departement" name="new_departement" size="6" multiple="multiple" >
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
                        <label for="timesheetinput1">Moyen hydraulique : </label>
                        <div class="position-relative has-icon-left" > 
                          <select name="new_code_moyen" id='select_new_moyen' class="select2 form-control" ></select>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Honoraire : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userinput2"  class="form-control " placeholder="Honoraire" name="new_honoraire">
                          <div class="form-control-position">
                            <i class="ft-mail"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Etat :</label>
                        <div class="position-relative has-icon-left">
                          <select name="new_etat" class="form-control">
                              <option value="actif">Actif</option>
                              <option value="passif">Passif</option>
                          </select>
                          <div class="form-control-position">
                            <i class="la la-navicon"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Commentaire :</label>
                        <div class="position-relative has-icon-left">
                          <textarea class="form-control"  rows="5" name="new_commentaire"></textarea>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="Confirm_Update()">Modifier</button>
      </div>
    </div>
  </div>
</div>


<?php include "../include/footer.php" ?>

<script type="text/javascript">


   $(document).ready(function(){
      get_all_data();
  });


 function get_all_data(){
   $.ajax({
        type:"POST",
        url: "../Actions/Prestataire_Actions/List_Prestataire_Action.php",
        
        success: function(data){
           
            $('#generer-table').html(data);

        }
      
    });
  }

function Update_row_UI(code)
{
  get_one_prestataire(code);
  $('#modal-edit').modal('show');
  select_moy('new_code_moyen');
}


function Confirm_Update()
  {

    var new_num_serie = $('input[name=new_num_serie]').val();
    var new_raison_sociale = $('input[name=new_raison_sociale]').val();
    var new_adresse = $('input[name=new_adresse]').val();
    var new_code_postal = $('input[name=new_code_postal]').val();
    var new_abonnement = $('input[name=new_abonnement]').val();
    var new_telephone = $('input[name=new_telephone]').val();
    var new_departement = $('select[name=new_departement]').val()+"";
    var new_honoraire = $('input[name=new_honoraire]').val();
    var new_etat = $('select[name=new_etat]').val();
    var new_commentaire = $('textarea[name=new_commentaire]').val();
    var new_code_moyen = $('select[name=new_code_moyen]').val();
    var old_num_serie = $('input[name=get_data_num_serie]').val();
    var new_ville = $('input[name=new_ville]').val();
     if((new_num_serie=="")||(new_raison_sociale==""))
    {
      swal("Erreur","Le numéro du serie et le raison sociale sont des champs obligatoires","error");
      return false;
    }
    $.ajax({
                type:"POST",
                url: "../Actions/Prestataire_Actions/Update_Prestataire_Action.php",
                data:{
                  new_num_serie:new_num_serie,
                  new_raison_sociale:new_raison_sociale,
                  new_adresse:new_adresse,
                  new_code_postal:new_code_postal,
                  new_abonnement:new_abonnement,
                  new_telephone:new_telephone,
                  new_departement:new_departement,
                  new_honoraire:new_honoraire,
                  new_etat:new_etat,
                  new_commentaire:new_commentaire,
                  new_code_moyen:new_code_moyen,
                  old_num_serie:old_num_serie,
                  new_ville:new_ville 
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


function get_one_prestataire(code)
{
   $.ajax({
        data: 
        { 
          num_serie:code,
        } ,
        type: "post",
        url: "../Actions/Prestataire_Actions/Get_Prestataire_Action.php",
        dataType:"json",
        success: function(data){
          if(data['success'] != null)
                {
                  $('input[name=get_data_num_serie').val(code);
                  $('input[name=new_num_serie]').val(data['success']['num_serie']);
                  $('input[name=new_raison_sociale]').val(data['success']['raison_sociale']);
                  $('input[name=new_adresse]').val(data['success']['adresse']);
                  $('input[name=new_code_postal]').val(data['success']['code_postal']);
                  $('input[name=new_abonnement]').val(data['success']['abonnement']);
                  $('input[name=new_telephone]').val(data['success']['telephone']);
                  //$('select[name=new_type_facture]').val(data['success']['type_facture']);
                  $('input[name=new_honoraire]').val(data['success']['honoraire']);
                  $('select[name=new_etat]').val(data['success']['etat']);
                  $('textarea[name=new_commentaire]').val(data['success']['commentaire']);
                  $('select[name=select_new_moyen]').val(data['success']['code_moyen']);
             }     
        }
      });
}

function select_departement(num_serie)
{
  var dep =                   '<option value="1">01 - Ain</option>'+
                              '<option value="2">02 - Aisne</option>'+
                              '<option value="3">03 - Allier</option>'+
                              '<option value="4">04 - Alpes-de-Haute-Provence</option>'+
                              '<option value="5">05 - Hautes-Alpes</option>'+
                              '<option value="6">06 - Alpes-Maritimes</option>'+
                              '<option value="7">07 - Ardèche</option>'+
                              '<option value="8">08 - Ardennes</option>'+
                              '<option value="9">09 - Ariège</option>'+
                              '<option value="10">10 - Aube</option>'+
                              '<option value="11">11 - Aude</option>'+
                              '<option value="12">12 - Aveyron</option>'+
                              '<option value="13">13 - Bouches-du-Rhône</option>'+
                              '<option value="14">14 - Calvados</option>'+
                              '<option value="15">15 - Cantal</option>'+
                              '<option value="16">16 - Charente</option>'+
                              '<option value="17">17 - Charente-Maritime</option>'+
                              '<option value="18">18 - Cher</option>'+
                              '<option value="19">19 - Corrèze</option>'+
                              '<option value="2A">2A - Corse-du-Sud</option>'+
                              '<option value="2B">2B - Haute-Corse</option>'+
                              '<option value="21">21 - Côte-d Or</option>'+
                              '<option value="22">22 - Côtes-d Armor</option>'+
                              '<option value="23">23 - Creuse</option>'+
                              '<option value="24">24 - Dordogne</option>'+
                              '<option value="25">25 - Doubs</option>'+
                              '<option value="26">26 - Drôme</option>'+
                              '<option value="27">27 - Eure</option>'+
                              '<option value="28">28 - Eure-et-Loir</option>'+
                              '<option value="29">29 - Finistère</option>'+
                              '<option value="30">30 - Gard</option>'+
                              '<option value="31">31 - Haute-Garonne</option>'+
                              '<option value="32">32 - Gers</option>'+
                              '<option value="33">33 - Gironde</option>'+
                              '<option value="34">34 - Hérault</option>'+
                              '<option value="35">35 - Ille-et-Vilaine</option>'+
                              '<option value="36">36 - Indre</option>'+
                              '<option value="37">37 - Indre-et-Loire</option>'+
                              '<option value="38">38 - Isère</option>'+
                              '<option value="39">39 - Jura</option>'+
                              '<option value="40">40 - Landes</option>'+
                              '<option value="41">41 - Loir-et-Cher</option>'+
                              '<option value="42">42 - Loire</option>'+
                              '<option value="43">43 - Haute-Loire</option>'+
                              '<option value="44">44 - Loire-Atlantique</option>'+
                              '<option value="45">45 - Loiret</option>'+
                              '<option value="46">46 - Lot</option>'+
                              '<option value="47">47 - Lot-et-Garonne</option>'+
                              '<option value="48">48 - Lozère</option>'+
                              '<option value="49">49 - Maine-et-Loire</option>'+
                              '<option value="50">50 - Manche</option>'+
                              '<option value="51">51 - Marne</option>'+
                              '<option value="52">52 - Haute-Marne</option>'+
                              '<option value="53">53 - Mayenne</option>'+
                              '<option value="54">54 - Meurthe-et-Moselle</option>'+
                              '<option value="55">55 - Meuse</option>'+
                              '<option value="56">56 - Morbihan</option>'+
                              '<option value="57">57 - Moselle</option>'+
                              '<option value="58">58 - Nièvre</option>'+
                              '<option value="59">59 - Nord</option>'+
                              '<option value="60">60 - Oise</option>'+
                              '<option value="61">61 - Orne</option>'+
                              '<option value="62">62 - Pas-de-Calais</option>'+
                              '<option value="63">63 - Puy-de-Dôme</option>'+
                              '<option value="64">64 - Pyrénées-Atlantiques</option>'+
                              '<option value="65">65 - Hautes-Pyrénées</option>'+
                              '<option value="66">66 - Pyrénées-Orientales</option>'+
                              '<option value="67">67 - Bas-Rhin</option>'+
                              '<option value="68">68 - Haut-Rhin</option>'+
                              '<option value="69">69 - Rhône</option>'+
                              '<option value="70">70 - Haute-Saône</option>'+
                              '<option value="71">71 - Saône-et-Loire</option>'+
                              '<option value="72">72 - Sarthe</option>'+
                              '<option value="73">73 - Savoie</option>'+
                              '<option value="74">74 - Haute-Savoie</option>'+
                              '<option value="75">75 - Paris</option>'+
                              '<option value="76">76 - Seine-Maritime</option>'+
                              '<option value="77">77 - Seine-et-Marne</option>'+
                              '<option value="78">78 - Yvelines</option>'+
                              '<option value="79">79 - Deux-Sèvres</option>'+
                              '<option value="80">80 - Somme</option>'+
                              '<option value="81">81 - Tarn</option>'+
                              '<option value="82">82 - Tarn-et-Garonne</option>'+
                              '<option value="83">83 - Var</option>'+
                              '<option value="84">84 - Vaucluse</option>'+
                              '<option value="85">85 - Vendée</option>'+
                              '<option value="86">86 - Vienne</option>'+
                              '<option value="87">87 - Haute-Vienne</option>'+
                              '<option value="88">88 - Vosges</option>'+
                              '<option value="89">89 - Yonne</option>'+
                              '<option value="90">90 - Territoire de Belfort</option>'+
                              '<option value="91">91 - Essonne</option>'+
                              '<option value="92">92 - Hauts-de-Seine</option>'+
                              '<option value="93">93 - Seine-Saint-Denis</option>'+
                              '<option value="94">94 - Val-de-Marne</option>'+
                              '<option value="95">95 - Val-d Oise</option>';
  $.ajax({
    type:"POST",
    url:"../Actions/Prestataire_Actions/Select_Departement_Action.php",
    data:{num_serie:num_serie},
    success:function(data){
        $('#new_departement').html(dep+data);
    }


  });
}

function select_moy(name)
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Moyen_Actions/Select_Moyen_Action.php",
        success: function(data){
            if(name=='new_code_moyen')
              $('#select_new_moyen').html(data);
            else
              $('#select_moyen').html(data); 
        }
      
    });
	initAutocomplete();
}

function Add_Prestataire()
{

  var num_serie = $('input[name=num_serie]').val();
  var raison_sociale = $('input[name=raison_sociale]').val();
  var adresse = $('input[name=adresse]').val();
  var code_postal = $('input[name=code_postal]').val();
  var abonnement = $('input[name=abonnement]').val();
  var telephone = $('input[name=telephone]').val();
  var departement = $('select[name=departement]').val()+"";
  var type_facture = $('select[name=type_facture]').val();
  var honoraire = $('input[name=honoraire]').val();
  var etat = $('select[name=etat]').val();
  var commentaire = $('textarea[name=commentaire]').val();
  var code_moyen = $('select[name=code_moyen]').val();
  var ville = $('input[name=ville]').val();
  if((num_serie=="")||(raison_sociale==""))
    {
      swal("Erreur","Le numéro du serie et le raison sociale sont des champs obligatoires","error");
      return false;
    }
  $.ajax({
        data: 
        { 
          num_serie:num_serie,
          raison_sociale:raison_sociale,
          adresse:adresse,
          code_postal:code_postal,
          abonnement:abonnement,
          telephone:telephone,
          departement:departement,
          type_facture:type_facture,
          honoraire:honoraire,
          etat:etat,
          commentaire:commentaire,
          code_moyen:code_moyen,
          ville:ville
        } ,
        type: "post",
        url: "../Actions/Prestataire_Actions/Add_Prestataire_Action.php",
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
  
function delete_row_UI(id)
  {

    $('#modal-supp').modal('show');
    $('input[name=get_data_num_serie').val(id);
        
  }

  function confirmDelete()
  {
    var num_serie = $('input[name=get_data_num_serie').val();
    $.ajax({
            type:"POST",
            url: "../Actions/Prestataire_Actions/Delete_Prestataire_Action.php",
            data: { num_serie:num_serie } ,
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
          location.replace("../Actions/Exel_Maker/Prestataire.php");          
 }

      function viderCompanyInfo() {
        document.getElementById("villect").value = "";
        document.getElementById("zipcode").value = "";
        document.getElementById("Adressest").value = "";
        document.getElementById("creation").value = "";
        document.getElementById("juridique").value = "";
        document.getElementById("Raison").value = "";
        document.getElementById("ape_code").value = "";
    }

    function getCompanyInfo() {
        viderCompanyInfo();
        var idCompany = document.getElementById("SIREN").value;
        if (idCompany.length > 1) {
            $.ajax({
                type: "GET",
                url: "https://api.opencorporates.com/v0.4/companies/fr/" + idCompany,

                success: function(data) {
                    console.log("data");
                    console.log(data);
                    if (data && data.results) {
                        if (data.results.company) {
                            var company = data.results.company;


                            if (company.registered_address) {
                                document.getElementById("villect").value = company.registered_address.region;
                                document.getElementById("zipcode").value = company.registered_address.postal_code;
                            }
                            document.getElementById("Adressest").value = company.registered_address_in_full;
                            document.getElementById("creation").value = company.incorporation_date;
                            document.getElementById("juridique").value = company.company_type;
                            document.getElementById("Raison").value = company.name;
                            if (company.industry_codes && company.industry_codes.length > 0) {

                                document.getElementById("ape_code").value = company.industry_codes[0].industry_code.code;
                            }

                        }

                    }
                },
                error: function(err) {
                    console.log("err");
                    console.log(err);

                }
            });
        }

    }

</script>

<script>
var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  country: 'long_name',
  postal_code: 'short_name'
};

var componentForm_new = {
  new_street_number: 'short_name',
  new_route: 'long_name',
  new_locality: 'long_name',
  new_postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  console.log('test');
  autocomplete_new = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete2'), {types: ['geocode']});
	  
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete_google'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);
  autocomplete_new.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
  autocomplete_new.addListener('place_changed', fillInAddress2);
  console.log(autocomplete);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  for (var component in componentForm) {
    //document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
	console.log(addressType);
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
	  console.log("intrégration d'information");

      document.getElementById(addressType).value = val;
    }
  }
}
function fillInAddress2() {
  // Get the place details from the autocomplete object.
  var place = autocomplete_new.getPlace();
  for (var component in componentForm) {
    //document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
	console.log(addressType);
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
	  console.log("intrégration d'information");

      document.getElementById('new_'+addressType).value = val;
    }
  }
}
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4Os6bvULwGQwgB1vRtFbdokohMsXwl_Y&libraries=places&callback=initAutocomplete"
        async defer></script>