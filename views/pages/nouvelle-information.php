<?php include "../include/header.php" ?>
<style type="text/css">

#curr_date , #curr_time{
	padding:5px 10px;
	border-radius: 5px;
	background: #333333;
	color:#cccccc;
	font-weight: bold;
	font-family: 'monospace';
}

</style>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Informations</h3>
    </div>
</div>
<div class="content-body container">
	<div class="row match-height justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-icons">Ajouter une information</h4>
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

						<form class="form" autocomplete="off" >
							<div class="form-body">
								<div class="row">
									<div class="col-md-8">
										<div class="col-md-8">
                    <div class="form-group">
                                <label >N° séquence :</label>
                                <div class="position-relative has-icon-left" id="n">
                                  
                                </div>
                              </div>
                  </div>
									</div>

								</div>
<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                                <label for="timesheetinput2">Date :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="date" id="date11" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="type d'évenement" name="date">
                                  <!-- <div id="curr_date"></div> -->
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                    <div class="form-group">
                                <label for="timesheetinput2">Heure <small>(format 24 heures)</small> :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="time" id="heure11" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="type d'évenement" name="hour">
                                  <!-- <div id="curr_time"></div> -->
                                </div>
                              </div>
                          </div>
                </div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
					                      <label for="timesheetinput2">Type d'évenement :</label>
					                      <div class="position-relative has-icon-left" >
					                        <select id="select_event" class="select form-control" name="id_event">

					                        </select>
					                      </div>

					                    </div>
					                </div>
					     </div>
               <div class="row">
					                <div class="col-md-12">
										<div class="form-group">
					                      <label for="timesheetinput2">Moyen hydraulique :</label>
					                      <div class="position-relative has-icon-left" >
					                        <select id="select_moyen" class="select form-control" name="code">

					                        </select>
					                      </div>
					                    </div>
					                </div>
								</div>
			               <div class="row">
					                <div class="col-md-12">
										<div class="form-group">
					                      <label for="timesheetinput2">Recherche d'adresse google</label>
					                      <div class="position-relative has-icon-left">
											<input type="text" id='autocomplete' class="form-control " placeholder="Adresse" name="adresse0" autocomplete="off"/>
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

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
					                      <label for="timesheetinput2">Code postal :</label>
					                      <div class="position-relative has-icon-left">
					                        <input type="text" id='postal_code' onblur="verifChaine('code_postal',3,'add-user')" class="form-control " placeholder="Code postal" name="code_postal">
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
							</div>

							<div class="form-actions right">
				                <button type="reset" class="btn btn-danger mr-1">
				                  <i class="ft-x"></i> Annuler
				                </button>
				                <button type="button" id="add-user" onclick="add_info()"  class="btn btn-primary">
				                  <i class="la la-check-square-o" ></i> Ajouter
				              </div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Correspond</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les Corresponds : </label>
                <div class="position-relative has-icon-left"  >
                 <select class="select2 form-control" multiple="multiple" name="listValidC" size="6" id="correspondant_valide">
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
                  <select class="select2 form-control" multiple="multiple" name="listInvalidC" size="6" id="correspondant_non_valide">
                 </select>
                </div>
              </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les prestataires  : </label>
                <div class="position-relative has-icon-left">
                  <select class="select2 form-control" multiple="multiple" name="listPrestataire" size="6" id="listPrestataire">
                 </select>
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <div class="form-group mt-2">
                <label for="timesheetinput1">Les groupes des prestataires  : </label>
                <div class="position-relative has-icon-left">
                  <select class="select2 form-control" multiple="multiple" name="listGroup" id="listGroup" onchange="select_prestataire_by_group('')">

                            </select>
                </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          	<div class="form-group">
              <label for="timesheetinput2">Commantaire :</label>
              <div class="position-relative has-icon-left">
              	<textarea class="form-control" rows="5" name="commentaire"></textarea>
              </div>
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="new_information()">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php" ?>

<script>
  var listPrestataire;
  var group="";
function select_correspondant()
{

	$.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Correspondants_Actions/Select_Correspondat_Action.php",

        success: function(data){

             $('#correspondant_valide').html(data);
             $('#correspondant_non_valide').html(data);

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


function select_n_sequence()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Information_Actions/Select_n_sequence.php",
        dataType:"JSON",
        success: function(data){

            var date = new Date();
            var year=date.getFullYear();
            year = year.toString()[2]+year.toString()[3];
            var year_last_n = data['success'].toString()[3]+data['success'].toString()[4];
            var n_sequence = parseInt(data['success'].toString().substring(5,data['success'].toString().length), 10);
            var month = date.getMonth();
            var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
            //document.getElementById("demo").innerHTML = months[d.getMonth()];

            var m=data['success'].toString()[0]+data['success'].toString()[1]+data['success'].toString()[2];
            var index = months.indexOf(m);
            if((month > index)||(year > year_last_n))
            {
              n_sequence=1;
            }
            else
              n_sequence++;



            if(n_sequence<10)
            $('#n').html(months[month]+year+'0'+n_sequence);
            else
            $('#n').html(months[month]+year+''+n_sequence);




        }

    });

}


function select_prestataire_by_group(code)
{
  if(code=="")
    var code_postal = $('select[name=listGroup]').val()+"";
  else 
    var code_postal = $('input[name=code_postal]').val().substring(0,2);
  $.ajax({
        type:"POST",
        data:{departement:code_postal},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_By_Group_Action.php",

        success: function(data){
              setInterval(1000);
              var l = data;
              listPrestataire+=l;
              $('#listPrestataire').html(listPrestataire);
              

        }

    });
}


 function select_prestataire()
{

  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Prestataire_Actions/Select_Prestataire_Action.php",

        success: function(data){
            listPrestataire = data;
              $('#listPrestataire').html(data);




        }

    });
}



function select_group()
{
  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Group_Actions/Select_Group_Action.php",

        success: function(data){
              group = data ;
              $('#listGroup').html(data);

        }

    });
}


function select_group_by_code()
{
  var departement = $('input[name=code_postal]').val().substring(0,2);
  
  $.ajax({
        type:"POST",
        data:{departement:departement},
        url: "../Actions/Group_Actions/Select_Group_For_Information_Action.php",
        success: function(data){
              group += data;
              
              $('#listGroup').html(group);

              $('#listGroup option[value="'+departement+'"]').attr('selected', true);
        }
    });
}



$(document).ready(function(){
	select_moyen();
	select_event();
  select_n_sequence();
  select_group();

  });


function new_information()
{




	var adresse_google = $('input[name=adresse0]').val();
	var link_adresse = "http://maps.google.com/maps?q=" + encodeURIComponent(adresse_google) + "'target='_blank'";

	var adresse = $('input[name=n]').val()+'*'+$('input[name=voie]').val()+'*'+$('input[name=adresse]').val();
	var commentaire = $('textarea[name=commentaire]').val();
	var code_postal = $('input[name=code_postal]').val();
	var ville = $('input[name=ville]').val();
	var listValidC = $('select[name=listValidC]').val();
	var listInvalidC = $('select[name=listInvalidC]').val();
	var listPrestataire = $('select[name=listPrestataire]').val();
	var id_event = $("#select_event option:selected").val();
	var code = $('select[name=code]').val();
	var listGroup = $('select[name=listGroup]').val();
  var date = $('input[name=date]').val();
  var hour = $('input[name=hour]').val();
	if((listValidC=="")||(listPrestataire==""))
  {
    swal("Erreur","Sélectionner les correspondants et les prestataires","error");
    return false;
  }
	$.ajax({
        data:{
			link_adresse:link_adresse,
			adresse_google:adresse_google,
      date:date,
      hour:hour,
			adresse:adresse,
			commentaire:commentaire,
			code_postal:code_postal,
			ville:ville,
			listValidC:listValidC,
			listInvalidC:listInvalidC,
			listPrestataire:listPrestataire,
			id_event:id_event,
			code:code,
			listGroup:listGroup,
      n_sequence:$('#n').html()
        } ,
        type: "post",
        url: "../Actions/Information_Actions/Add_Information_Action.php",
        dataType:"json",
        success: function(data){
        	if(data['success']=='success')
          {
           	$('#modal2').modal('hide');
            swal("Success","Insertion est terminée avec success","success");
            location.replace("liste-des-informations.php");
          }
          else
            swal("Erreur","Insertion est échouée","error");

        }
      });
}


// var div = document.getElementById('curr_time');
function time() {
  // div.innerHTML = "";
  var d = new Date();
  var s = d.getSeconds() < 10 ? '0' + d.getSeconds() : d.getSeconds();
  var m = d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
  var h = d.getHours() < 10 ? '0' + d.getHours() : d.getHours();
  // div.innerHTML = h + ":" + m + ":" + s;
  $('#heure11').val(h + ":" + m );
}

setInterval(time, 1000);
//
// var div2 = document.getElementById('curr_date');
function date() {
  // div2.innerHTML = "";
  var a = new Date();
  var year = a.getFullYear();
	// var month = months[a.getMonth()];
	var month = a.getMonth() < 10 ? '' + a.getMonth()+1 : a.getMonth()+1;
	var date = a.getDate();
	if (date <10) {date='0'+date;}
	$('#date11').val(year + "-" + month + "-" + date);
  // div2.innerHTML = date + "-" + month + "-" + year;
}

date();
setInterval(date, 1000*60*60);





  function add_user(){
    var nom = $('input[name=nom]').val();
	var prenom = $('input[name=prenom]').val();
	var telephone = $('input[name=telephone]').val();
	var date_naissance = $('input[name=date_naissance]').val();
      if(prenom  &&nom &&telephone &&date_naissance ){
          $.ajax({
              type:"POST",
              url: "add_client",
              data:{nom:nom, prenom:prenom, telephone:telephone, date_naissance:date_naissance},
              dataType:"json",
              success: function(data){
                if (data.msg ==  'success'){
                  window.location = "liste-des-clients";
                }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
                }

              }

          });


      }else{
          swal("Erreur","Tous les champs doivent êtres remplis","error");
      }
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
        select_group();
        select_prestataire();
        select_correspondant();
        setTimeout(function(){ 
		select_prestataire_by_group('c');
        select_group_by_code();  
	   		$('#modal2').modal('show');}, 1000);
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
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
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
