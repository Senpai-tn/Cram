<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Informations</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item"  data-toggle="modal" onclick="prepare_PDF()" data-target="#myModal" >Exporter PDF</a>
            <a class="dropdown-item" data-toggle="modal" onclick="prepare_Exel()" data-target="#myModalExel" >Exporter Exel</a>
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
            <h4 class="card-title">liste des informations</h4>
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

              <!-- recherche -->
              <div class="box-header">
                <div class="box-tools">
                  <div class="input-group1 input-group-sm" style="width: 180px;">
                    <input type="text" onkeyup="search()" name="search" class="form-control pull-right" placeholder="Recherche">
                    <div class="input-group-btn1">
                      
                    </div>
                  </div>
                </div>
            </div>

               <div class="table-responsive" id="generer-table">
                    
              </div>
              <input type="hidden" name="get_data_n_sequence" value="">
              <input type="hidden" name="get_data_v" id="v" value="">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<div class="modal fade" id="myModalExel" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    <a target="_blank" href="../Actions/Exel_Maker/Information.php?idc=0&idp=0">Exporter tous les informations</a>
                </p>
                <br>
                <div >
                    <select class="select2 form-control"  name="correspondantE" id="correspondantE"></select>
                </div>
                <p>
                    <a target="_blank" onclick="Export_XLS('1')" id="myLink" href="" class="btn btn-success" >Exporter les informations du correspondant sélectioné</a>
                </p>
                <p>
                    <div>
                        <select name="prestataireE" id="prestataireE" class="select2 form-control"></select>
                    </div>
                </p>
                <p>
                    <a target="_blank" onclick="Export_XLS('2')" id="myLink" href="" class="btn btn-success" >Exporter les informations du prestataire sélectioné</a>
                </p>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    <a target="_blank" href="../Actions/Information_Actions/Make_PDF_Action.php?idc=0&idp=0">Exporter tous les informations</a>
                </p>
                <br>
                <div >
                    <select class="select2 form-control"  name="correspondantP" id="correspondantP"></select>
                </div>
                <p>
                    <a target="_blank" onclick="ExportC_PDF('1')" id="myLink" href="" class="btn btn-success" >Exporter les informations du correspondant sélectioné</a>
                </p>
                <p>
                <div>
                    <select name="prestataireP" id="prestataireP" class="select2 form-control"></select>
                </div>
                </p>
                <p>
                    <a target="_blank" onclick="ExportC_PDF('2')" id="myLink" href="" class="btn btn-success" >Exporter les informations du prestataire sélectioné</a>
                </p>

            </div>
        </div>
    </div>
</div>

<!-- exporter -->
<div class="modal fade text-left" id="modal-exporter" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-print" aria-hidden="true"></i>Exporter la liste des informations</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Prestataire:</label>
                      <div class="position-relative has-icon-left">
                            <select class="select2 form-control"  multiple="multiple">
                              <option value="0"></option>
                              <option value="01">Alex</option>
                              <option value="02">Kira</option>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="timesheetinput2">Date</label>
                        <div class="position-relative has-icon-left">
                          <input type="month" id="userinput1" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="Date de fin" name="nom">
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" onClick="recherche()" class="btn btn-primary" name="button">Rechercher</button>
                  </div>
                </div>
                <div class="table-responsive" id="generer-table-recherche" style="display:none;">
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Numéro séquenciel</th>
                       <th>Validité</th>
                       <th>Date & heure</th>
                       <th>Type d'évenement </th>
                       <th>Moyen hydraulique</th>
                       <th>Adresse </th>
                       <th>Code postal</th>
                       <th>Ville</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <th scope="row">NOV190001</th>
                       <td><div class="badge badge-success">validé</div></td>
                       <td>23-08-2019 00:12:51</td>
                       <td>Type 1</td>
                       <td>Moyen 1</td>
                       <td>France paris</td>
                       <td>85455</td>
                       <td>Paris</td>
                       <td>
                         <div class="dropdown">
                           <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                             <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modal2">Modifier</a>

                           </div>
                         </div>
                       </td>
                     </tr>
                     <tr>
                       <th scope="row">NOV190001</th>
                       <td><div class="badge badge-success">validé</div></td>
                       <td>23-08-2019 00:12:51</td>
                       <td>Type 1</td>
                       <td>Moyen 1</td>
                       <td>France paris</td>
                       <td>85455</td>
                       <td>Paris</td>
                       <td>
                         <div class="dropdown">
                           <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                             <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modal2">Modifier</a>

                           </div>
                         </div>
                       </td>
                     </tr>
                   </tbody>
                 </table>
               </div>

              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="delete_row();">Exporter</button>
      </div>
    </div>
  </div>
</div>
<!-- fin exporter -->

<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Correspond</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les Corresponds : </label>
                <div class="position-relative has-icon-left"  >
                 <select class="select2 form-control" multiple="multiple" name="new_listValidC" size="6" id="correspondant_valide">
                  
                 </select>
                </div>
              </div>
          </div>
        </div>


       
          <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les Correspondants non validés : </label>
                <div class="position-relative has-icon-left" >
                  <select class="select2 form-control" multiple="multiple" name="new_listInvalidC" size="6" id="correspondant_non_valide">

                 </select>
                </div>
              </div>
          </div>
        </div>
       

        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les prestataires validés : </label>
                <div class="position-relative has-icon-left">
                  <select class="select2 form-control" multiple="multiple" name="new_listValidPrestataire" size="6" id="listValidPrestataire">

                 </select>
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les prestataires non validés : </label>
                <div class="position-relative has-icon-left">
                  <select class="select2 form-control" multiple="multiple" name="new_listInvalidPrestataire" size="6" id="listInvalidPrestataire">

                 </select>
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

<?php 
  include "../include/footer.php"; 
?>





<script>
  var prestataires = "";
  var correspondants="";
  var linkpdf="";
  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "../Actions/Information_Actions/List_Information_Action.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
      
    });


  }



function list_prestataire()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_Action.php",
        success: function(data){           
              $('#listPrestataire').html(data);
              prestataires = data ;     
        }    
    });
}

  function select_prestataireValid(n_sequence)
{
  
  $.ajax({
        type:"POST",
        data:{n_sequence:n_sequence},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_for_information_Action.php",
        success: function(data){  
              $('#listValidPrestataire').html(prestataires+data);     
        }    
    });
}

 function select_prestataireInvalid(n_sequence)
{
  
  $.ajax({
        type:"POST",
        data:{notvalide:1,n_sequence:n_sequence},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_for_information_Action.php",
        success: function(data){  
              $('#listInvalidPrestataire').html(prestataires+data);     
        }    
    });
}


function listCorrespondant()
{
   $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Correspondants_Actions/Select_All_Correspondat_Action.php",
        success: function(data){
             $('#correspondant_valide').html(data);
             $('#correspondant_non_valide').html(data);
             correspondants=data;
        }
    });
}

function select_not_valide_correspondant(n_sequence)
{
   $.ajax({
        type:"POST",
        data:{notvalide:1,n_sequence:n_sequence},
        url: "../Actions/Correspondants_Actions/Select_Correspondat_for_information_Action.php",
        success: function(data){
          
             $('#correspondant_non_valide').html(correspondants+data);
        }
    });
}


function select_correspondant(n_sequence)
{ 
  
  $.ajax({
        type:"POST",
        data:{n_sequence:n_sequence},
        url: "../Actions/Correspondants_Actions/Select_Correspondat_for_information_Action.php",
        success: function(data){  

             $('#correspondant_valide').html(correspondants+data);
        }
      
    });
  
}



 function get_one_information(n_sequence){
        $.ajax({
            type:"POST",
            url: "../Actions/Information_Actions/Get_Information_Action.php",
            data:{n_sequence:n_sequence},
            dataType:"json",
            success: function(data){
                if(data['success'] != null)
                {
                  var dt = "";
                  var date_facture = data['success']['date_facture'].substring(0,10);
                  var time_facture = data['success']['date_facture'].substring(11,19);
                  $('input[name=get_data_n_sequence').val(n_sequence);
                  $('input[name=ville]').val(data['success']['ville']);
                  //alert(date_facture);
                  $("#date").val(date_facture);
                  $("#time").val(time_facture);
                  //$("#"+data['success']['valid']).prop( "checked", true );
                  $('select[name=id_event]').val(data['success']['id_event']);
                  $('select[name=code]').val(data['success']['code']);
                  $('input[name=adresse]').val(data['success']['adresse']);
                  $('input[name=code_postal]').val(data['success']['code_postal']);
                  select_correspondant(n_sequence); 
                  select_not_valide_correspondant(n_sequence);
                  select_prestataireValid(n_sequence);
                  select_prestataireInvalid(n_sequence);
                }
              
              }
            
        });
  }

function search(){
  var filter = $('input[name=search]').val();
  $.ajax({
        type:"POST",
        data:{filter:filter},
        url: "../Actions/Information_Actions/Filter_Information_Action.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
      
    });
}

function select_moyen()
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

function select_event()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Events_Actions/Select_Event_Action.php",
        
        success: function(data){
           
             $('#select_event').html(data);
             

        }
      
    });
  
}



$(document).ready(function(){
  select_moyen();
  select_event();
   get_all_data(); 
   
   listCorrespondant();
   list_prestataire();
  });


  function Update_row_UI(n_sequence)
{

  //$('#listPrestataire').html(""); 
  //$('#correspondant_valide').html("");
  get_one_information(n_sequence);
  $('#modal2').modal('show');

  
}

 function Confirm_Update()
  {

   
    var listValidC = $('select[name=new_listValidC]').val();
    var listValidPrestataire = $('select[name=new_listValidPrestataire]').val();
    var n_sequence = $('input[name=get_data_n_sequence').val();
    var listInvalidC = $('select[name=new_listInvalidC]').val();
    var listInvalidPrestataire = $('select[name=new_listInvalidPrestataire]').val();

    if((listValidC=="")||(listValidPrestataire==""))
    {
      swal("Erreur","Sélectionner les correspondants et les prestataires","error");
      return false;
    }
    $.ajax({
                type:"POST",
                url: "../Actions/Information_Actions/Update_Information_Action.php",
                data:{
                      listValidC:listValidC,
                      listValidPrestataire:listValidPrestataire,
                      listInvalidPrestataire:listInvalidPrestataire,
                      listInvalidC:listInvalidC,
                      n_sequence:n_sequence
                },
                dataType:"json",
                success: function(data){
                  if (data['success'] ==  'success'){
                    get_all_data();
                      $('#modal2').modal('hide');
                      
                      swal("Success","Modification est terminée avec success","success");
                  }else {
                      swal("Erreur","L'opération est echoué , réesseyer ","error");
                  }


                }

            });

  }
  
  $(".hide2").fadeOut();
    $("select[name=autres]").change(function(){
        var reponse = $("select[name=autres] option:selected").val();

        if(reponse=='autres'){
          $(".hide2").fadeIn();
        }else{
            $(".hide2").fadeOut();
        }
    });

    // add
     function add_info(){
        $('#modal2').modal('show');
     }

       function prepare_PDF () {
           $('#correspondantP').html(correspondants);
           $('#prestataireP').html(prestataires);
       }

  function prepare_Exel () {
      $('#correspondantE').html(correspondants);
      $('#prestataireE').html(prestataires);
  }
        function ExportC_PDF(i) {
            if(i == 1 )
                linkpdf ='../Actions/Information_Actions/Make_PDF_Action.php?idc='+$('select[name=correspondantP]').val()+"&idp=0";
            else
                linkpdf ='../Actions/Information_Actions/Make_PDF_Action.php?idc=0&idp='+$('select[name=prestataireP]').val();

            window.open(linkpdf, '_blank');
        }

       function Export_XLS(i){
           var linkexel="";
         if(i == 1 )
            link ="../Actions/Exel_Maker/Information.php?idc="+$('select[name=correspondantE]').val()+"&idp=0";
         else
             link ="../Actions/Exel_Maker/Information.php?idc=0&idp="+$('select[name=prestataireE]').val();

         var excel_data = encodeURIComponent($('#generer-table').html());
         window.open(link,'_blank');
 }
</script>



<!-- google api place search -->
<!-- id="autocomplete" onFocus="geolocate()" -->
<script>

     var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {


        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
            {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);


      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }


        function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }

      function recherche() {
        $('#generer-table-recherche').fadeIn(100);
      }


function Update(listC,listP)
{
  var array = listC.split(',');
  for (var i = 0; i < array.length; i++) 
  {
    $('#correspondant_valide option')
    .filter(function() { return $.trim( $(this).text() ) == array[i]; })
    .attr('selected',true); 
  }

  var a = listP.split(',');
  for (var i = 0; i < a.length; i++) 
  {
    $('#listPrestataire option')
    .filter(function() { return $.trim( $(this).text() ) == a[i]; })
    .attr('selected',true); 
  }
}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7apvfJ-hUlKEesHD9IpLY1StGzrOg_h8&libraries=places&callback=initAutocomplete"
        async defer></script>
