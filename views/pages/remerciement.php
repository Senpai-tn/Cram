<?php include "../include/header.php" ?>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Factures</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ajouter-facture">Ajouter facture </a>
           
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
            <h4 class="card-title">liste des factures des fournisseurs</h4>
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
              <input type="hidden" name="get_data_id"  value="">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<!-- ajouter facture -->
<div class="modal fade text-left" id="ajouter-facture" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Ajouter facture</h4>
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
                          <label for="timesheetinput2">Date :</label>
                                <div class="position-relative has-icon-left">
                                  <input type="date" id="date11" class="form-control " placeholder="type d'évenement" name="date" onchange="set_date()">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="timesheetinput2">Montant hors TVA :</label>
                          <div class="position-relative has-icon-left">
                            <input type="number" id="heure11" step="any" class="form-control " placeholder="Montant hors TVA" name="montant">
                            <div class="form-control-position">
                              <i class="ft-calendar"></i>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-2">
                          <label for="timesheetinput1">Le Correspondant : </label>
                          <div class="position-relative has-icon-left">
                            <select class="select2 form-control" name="listC" size="6" id="correspondant_valide">
                            </select>
                          </div>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="form-group mt-2">
                          <label for="timesheetinput1">Numéro de facture : </label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="billnumber" class="form-control" placeholder="Entrer le numéro du séquence du facture" name="billnumber" >
                           
                          </div>
                        </div>
                        
                    </div>
                </div> 
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        
                        
                          <input type="month" id="userinput1" hidden class="form-control " placeholder="Nom" name="end_date" disabled>
                          
                         
                    </div>
                </div>
                </div>  
              </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" id="add-user" onclick="Add_Bill()">Ajouter</button>
      </div>
    </div>
  </div>
</div>



<!-- supprimer -->
<div class="modal fade text-left" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer résultat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet résultat ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="delete_row();">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- email -->
<div class="modal fade text-left" id="show2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Envoyer par email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="timesheetinput1">E-mail : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userinput2" onblur="verifEmail('email','add-user')" class="form-control " placeholder="E-mail" name="email">
                          <div class="form-control-position">
                            <i class="ft-mail"></i>
                          </div>
                        </div>
                      </div>
                  </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" id="sendButton" onclick="send_Email();">Envoyer</button>
      </div>
    </div>
  </div>
</div>



<!-- modifier -->
<div class="modal fade text-left" id="show1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-success white">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-pencil-square" aria-hidden="true"></i> Modifier résultat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" id="form-result">
              <div class="form-body">
                <h4 class="form-section"></i> Données du résultat</h4>
                
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="liste-clients">Client :</label>
                  <div class="col-md-9">
                      <select id="liste-clients" name="client" class="form-control">
                      </select>

                    </div>
                </div>
                <div class="form-group row">
                  <!-- <p>Fichier courant : <span id="current_file"></span></p> -->
                  <label class="col-md-3 label-control">Fichier courant :</label>
                  <div class="col-md-9">
                    <p id="file_link"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <!-- <p>Fichier courant : <span id="current_file"></span></p> -->
                  <label class="col-md-3 label-control">Résultat de l'analyse :</label>
                  <div class="col-md-9">
                    <fieldset class="form-group">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
                        </div>
                    </fieldset>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="projectinput9">Remarques <small>(facultatif)</small></label>
                  <div class="col-md-9">
                    <textarea id="projectinput9" rows="5" class="form-control" name="remarque"></textarea>
                    <input type="hidden" name="id" value="">
                  </div>
                </div>
                
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" onclick="update();" id="edit-user" class="btn btn-success">Modifier</button>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php" ?>

<script type="text/javascript">
  function select_correspondant()
{

  $.ajax({
        type:"POST",
        data:{},
        url: "../Actions/Correspondants_Actions/Select_Correspondat_Action.php",

        success: function(data){

             $('#correspondant_valide').html(data);
             

        }

    });

}

function Show_UI(num)
{
  $('input[name=get_data_id]').val(num);
}


 function send_Email()
{
  $('#sendButton').attr("disabled", true);
  $.ajax({
        type:"POST",
        data:{
                num:$('input[name=get_data_id]').val(),
                email:$('input[name=email]').val()
              },
        dataType:'JSON',
        url: "../Actions/Bill_Actions/Send_Mail_Correspondant_Action.php",
        success: function(data){
          if(data['success']=='success')
          {
            $('#show2').modal('hide');
            swal("Success","Mail envoyé","success");
            $('#sendButton').attr("disabled", false);
          }
          else 
          {
            swal("Erreur","Mail non envoyé","error");
            $('#sendButton').attr("disabled", false);
          }
        }
      
    });
}

   function get_all_data(){
    $.ajax({
        type:"POST",
        data:{filter:""},
        url: "../Actions/Bill_Actions/List_Bill_Correspondant.php",
        //dataType:"JSON",
        success: function(data){
           
             $('#generer-table').html(data);
            
          
        }
      
    });
  }

  $(document).ready(function(){
    get_all_data();
    select_correspondant();
    set_date();
  })


function search(){
  var filter = $('input[name=search]').val();
  $.ajax({
        type:"POST",
        data:{filter:filter},
        url: "../Actions/Bill_Actions/List_Bill_Correspondant.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
      
    });
}

function date() {
  // div2.innerHTML = "";
  var a = new Date();
  var year = a.getFullYear();
  // var month = months[a.getMonth()];
  var month = a.getMonth() < 10 ? '0' + a.getMonth()+1 : a.getMonth()+1;
  var date = a.getDate();
  if (date <10) {date='0'+date;}
  $('#date11').val(year + "-" + month + "-" + date);
  // div2.innerHTML = date + "-" + month + "-" + year;
}
date();

function Add_Bill()
{
  var date = $('input[name=date]').val();
  var montant = $('input[name=montant]').val();
  var code = $('select[name=listC]').val();
  var end_date = $('input[name=end_date]').val();
  var billnumber = $('#billnumber').val();
  if(montant=="")
  {
    swal("Erreur","Le montant est un champ obligatoire","error");
    return false;
  }
  if(billnumber=="")
  {
    swal("Erreur","Le numéro du facture est obligatoire","error");
    return false;
  }
  $.ajax({
    type:"POST",
    data:{date_facture:date,
          montant:montant,
          code:code,
          end_date:end_date,
          billnumber:billnumber
        },
    dataType:"JSON",
    url:"../Actions/Bill_Actions/Add_Bill_Correspondnt_Action.php",
    success:function(data){
      
      if(data['success']=='success')
      {
        get_all_data();
           $('#ajouter-facture').modal('hide');
           swal("Success","Facture est enregistrée avec success","success");
      }
    }

    });
  
}

function set_date()
{
  var month = parseFloat($('input[name=date]').val()[5]+$('input[name=date]').val()[6]);
  var year = parseFloat($('input[name=date]').val().substring(0,4));
  if(month==12)
  {
    month=1;
    year=year+1;
  }
  else 
  month=month+1;


  if(month<=9)
    month='0'+(month);
  $('input[name=end_date]').val(year+'-'+month);
  
  
}
</script>
<!-- 

<script>

  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "liste-resultats",
        dataType:"json",
        success: function(data){
          $('#generer-table').html(''); 
          $('#generer-table').append(data.msg); 
        }
      
    });
  }
    function get_all_clients(){
    $.ajax({
        type:"POST",
        url: "select-clients",
        dataType:"json",
        success: function(data){
          $('#liste-clients').html(''); 
          $('#liste-clients').append(data.msg); 
        }
      
    });
  }


  $(document).ready(function(){ 
      get_all_data();
      get_all_clients();
  });

  //  get id du ligne séléctioné
  function get_id(id){
      $('input[name=get_data_id]').val(id);
  }

  function traite_date(date){
    var d = new Date(date);
    return  [
               d.getDate(),
               d.getMonth()+1,
               d.getFullYear()].join('-')+' '+
              [d.getHours(),
               d.getMinutes()].join(':');
  }



  function get_data_one_user(){
    var id= $('input[name=get_data_id]').val();
    if(id != ""){
        $.ajax({
            type:"POST",
            url: "get_one_resultat",
            data:{id:id},
            dataType:"json",
            success: function(data){
              if (data.msg ==  'echec'){
                  swal("Erreur","Erreur lors de recheche résultat","error");
              }else {
                  // $("#liste-clients").select2("val",(data.msg.client).toString());
                  $("#liste-clients").val(data.msg.client);
                  $('textarea[name=remarque]').val(data.msg.remarque);
                  // $('#file_link').attr("href","img/resultats/"+data.msg.file);
                  $('#file_link').html(data.msg.file);
                  $('input[name=id]').val(id);
              }
            }
        });
    }else{
      $("#liste-clients").select2("val","");
      $('textarea[name=remarque]').val();
    }

  }


  // delete this row
  function delete_row(){
    var id= $('input[name=get_data_id]').val();
    if(id != ""){
        $.ajax({
            type:"POST",
            url: "delete_resultat",
            data:{id:id},
            dataType:"json",
            success: function(data){
              if (data.msg ==  'success'){      
                  $('#show').modal('hide');          
                  get_all_data();
              }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
              }
            }
        });
    }else{
      swal("Erreur","Aucun résultat séléctioné","error");
    }
  }


  // modifier user
  function update(){
      var client = $('select[name=client]').val();
      var file = $('input[name=file]').val();
      var formData = new FormData($("#form-result")[0]);
       var id= $('input[name=get_data_id]').val();
    if(id != ""){
        
      if(client  &&file ){
          $.ajax({
                type:"POST",
                url: "edit_result",
                dataType:"json",
              "headers": {
                "cache-control": "no-cache"
              },
              "processData": false,
              "contentType": false,
              "mimeType": "multipart/form-data",
              "data": formData,
                success: function(data){
                  if (data.msg ==  'success'){
                    get_all_data();
                    get_all_clients();
                    swal("Success","La modification est terminée avec succèss","success");
                  }else if(data.msg == 'file-not-exist'){
                    swal("Erreur","il faut choisir le fichier de l'analyse du client","error");
                  }else {
                    swal("Erreur","L'opération est echoué , réesseyer ","error");
                  }
              }
            
          });

        
      }else{
          swal("Erreur","Tous les champs doivent êtres remplis","error");
      }
    }else{
        swal("Erreur","Aucun résultat séléctioné","error");
    }
  }


</script> -->