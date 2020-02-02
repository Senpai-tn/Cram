<?php include "../include/header.php" ?>

<style>
.pac-container {
    z-index: 1051 !important;
}
</style>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Correspondants</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter correspondant </a>
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
            <h4 class="card-title">liste des correspondants</h4>
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
                      <th>Code</th>
                      <th>Nom et prenom</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>E-mail</th>
                      <th>Téléphone</th>
                      <th>Etat</th>
                      <th>Prix achats</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark zugr</td>
                      <td>Paris</td>
                      <td>76620</td>
                      <td>test@gmail.fr</td>
                      <td>5200000</td>
                      <td>Actif</td>
                      <td>70 €</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#">Modifier</a>
                            <a class="dropdown-item" href="#">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Mark zugr</td>
                      <td>Paris</td>
                      <td>76620</td>
                      <td>test@gmail.fr</td>
                      <td>5200000</td>
                      <td>Actif</td>
                      <td>70 €</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#">Modifier</a>
                            <a class="dropdown-item" href="#">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Mark zugr</td>
                      <td>Paris</td>
                      <td>76620</td>
                      <td>test@gmail.fr</td>
                      <td>5200000</td>
                      <td>Actif</td>
                      <td>70 €</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#">Modifier</a>
                            <a class="dropdown-item" href="#">Supprimer</a>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Ajouter un correspondant</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du correspondant</h4>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="code">Code :</label>
                        <div class="position-relative has-icon-left">
                        <input type="text" id="code" class="form-control " placeholder="Code" name="code">
                        <div class="form-control-position">
                          <i class="la la-copyright"></i>
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom">nom  et prenom :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="nom"  class="form-control " placeholder="nom et prenom" name="nom">
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
                        <label for="timesheetinput2">Recherche d'adresse google</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id='autocomplete_google' class="form-control " placeholder="Adresse" name="adresse_google" autocomplete="0">
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
                        <label for="email">E-mail : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="email"  class="form-control " placeholder="E-mail" name="email">
                          <div class="form-control-position">
                            <i class="ft-mail"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telephone">Téléphone</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="telephone"  class="form-control " placeholder="Téléphone" name="telephone">
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
                        <label for="timesheetinput1">Etat :</label>
                        <div class="position-relative has-icon-left">
                          <select name="etat" class="form-control">
                              <option value="Actif">Actif</option>
                              <option value="Passif">Passif</option>
                          </select>
                          <div class="form-control-position">
                            <i class="la la-navicon"></i>
                          </div>
                        </div>
                      </div>
                      
                  </div>
                  
                
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="prix">Prix achats : </label>
                        <div class="position-relative has-icon-left">
                        <input type="number" id="prix"  class="form-control" placeholder="Prix achats " name="prix">
                        <div class="form-control-position">
                          <i class="la la-euro"></i>
                        </div>
                      </div>
                      </div>
                  </div>
                </div>
              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="new_correspondant()">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- supprimer -->
<div class="modal fade text-left" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet client ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="show1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Modifier le correspondant</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées du correspondant</h4>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="code">Code :</label>
                        <div class="position-relative has-icon-left">
                        <input type="text" id="code" class="form-control " placeholder="Code" name="new_code">
                        <div class="form-control-position">
                          <i class="la la-copyright"></i>
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom">nom  et prenom :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="nom"  class="form-control " placeholder="nom et prenom" name="new_nom">
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
                        <label for="timesheetinput2">Recherche d'adresse google</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id='autocomplete2' class="form-control " placeholder="Adresse" name="new_adresse_google" autocomplete="0">
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
                  <input type="hidden" id='new_administrative_area_level_1'/>
                  <input type="hidden" id='new_country'/>
                  <input type="hidden" id='new_voie' class="form-control " placeholder="Voie" name="voie">
                  <div class="col-md-6">
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
                        <label for="email">E-mail : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="email"  class="form-control " placeholder="E-mail" name="new_email">
                          <div class="form-control-position">
                            <i class="ft-mail"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telephone">Téléphone</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" id="telephone"  class="form-control " placeholder="Téléphone" name="new_telephone">
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
                  
                
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="prix">Prix achats : </label>
                        <div class="position-relative has-icon-left">
                        <input type="number" id="prix"  class="form-control" placeholder="Prix achats " name="new_prix">
                        <div class="form-control-position">
                          <i class="la la-euro"></i>
                        </div>
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
  function get_value(str)
{
  return ($('input[name='+str+']').val());
}

 $(document).ready(function(){

      get_all_data();  
  });

function get_all_data(){
    $.ajax({
        type:"POST",
        url: "../Actions/Correspondants_Actions/List_Correspondant_Action.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
      
    });
  }

  function new_correspondant()
 {
    
    var code = get_value('code');
    var nom = get_value('nom');
    var adresse = get_value('adresse');
    var code_postal = get_value('code_postal');
    var email = get_value('email');
    var telephone = get_value('telephone');
    var etat = $('select[name=etat]').val();
    var ville = get_value('ville');
    var prix = get_value('prix');
    if((code=="")||(nom==""))
    {
      swal("Erreur","Le Code et le nom sont des champs obligatoires","error");
      return false;
    }
    
       $.ajax({
        data:{ code: code, nom:nom,adresse:adresse,code_postal:code_postal,email:email,telephone:telephone,etat:etat,prix:prix,ville:ville } ,
        type: "post",
        url: "../Actions/Correspondants_Actions/Add_Correspondant_Action.php",
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

  function Update_row_UI(code)
{
  get_one_correspondant(code);
  $('#show1').modal('show');
}

function get_one_correspondant(code){
  
        $.ajax({
            type:"POST",
            url: "../Actions/Correspondants_Actions/Get_Correspondant_Action.php",
            data:{code:code},
            dataType:"json",
            success: function(data){
                if(data['success'][0] != null)
                {
                  $('input[name=get_data_code').val(code);
                  $('input[name=new_nom').val(data['success'][0]['nom']);
                  $('input[name=new_telephone').val(data['success'][0]['telephone']);
                  $('input[name=new_code]').val(data['success'][0]['code']);
                  $('input[name=new_adresse]').val(data['success'][0]['adresse']);
                  $('input[name=new_code_postal]').val(data['success'][0]['code_postal']);
                  $('input[name=new_email]').val(data['success'][0]['email']);
                  $('select[name=new_etat]').val(data['success'][0]['etat']);
                  $('input[name=new_prix]').val(data['success'][0]['prix']);
                  $('input[name=new_ville]').val(data['success'][0]['ville']);
                }
              }
        });
  }


 function Confirm_Update()
  {
    var new_nom=get_value('new_nom');
    var code=get_value('get_data_code');
    var new_telephone =get_value('new_telephone');
    var new_adresse = $('input[name=new_adresse]').val();
    var new_code_postal = $('input[name=new_code_postal]').val();
    var new_email = $('input[name=new_email]').val();
    var new_etat = $('select[name=new_etat]').val();
    var new_prix = $('input[name=new_prix]').val();
    var new_ville = get_value('new_ville');
    
    $.ajax({
                type:"POST",
                url: "../Actions/Correspondants_Actions/Update_Correspondant_Action.php",
                data:{
                  code:code,
                  new_nom:new_nom,
                  new_telephone:new_telephone,
                  new_adresse:new_adresse,
                  new_code_postal:new_code_postal,
                  new_email:new_email,
                  new_etat:new_etat,
                  new_prix:new_prix,
                  new_ville:new_ville

                },
                dataType:"json",
                success: function(data){
                  if (data['success'] ==  'success'){
                    get_all_data();
                      $('#show1').modal('hide');
                      
                      swal("Success","Modification est terminée avec success","success");
                  }else {
                      swal("Erreur","L'opération est echoué , réesseyer ","error");
                  }


                }

            });

  }

  function delete_row_UI(id)
  {

    $('#show').modal('show');
    $('input[name=get_data_code').val(id);
        
  }

  function confirmDelete()
  {
    var code = get_value('get_data_code');
    $.ajax({
            type:"POST",
            url: "../Actions/Correspondants_Actions/Delete_Correspondant_Action.php",
            data: { code:code } ,
            dataType:"json",
            success: function(data){
              if (data['success'] ==  'success'){
                  get_all_data();
                  $('#show').modal('hide'); 
                  swal("Success","Suppression est terminée avec success","success");   
              }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
              }
            }
        });
  }


function Export_XLS(){  
      
          var excel_data = encodeURIComponent($('#generer-table').html());  
          location.replace("../Actions/Exel_Maker/Correspondant.php");          
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

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
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