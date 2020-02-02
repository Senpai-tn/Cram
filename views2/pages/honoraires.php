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
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-facture-honoraires">Ajouter facture </a>
            <!-- <a class="dropdown-item" href="#">Exporter excel</a> -->
          </div>
        </div>
      </div>
    </div>
</div>


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
        <button type="button" class="btn btn-primary" onclick="send_Email();">Envoyer</button>
      </div>
    </div>
  </div>
</div>




<!-- exporter -->
<div class="modal fade text-left" id="modal-facture-honoraires" tabindex="-1" role="dialog"  aria-hidden="true" onload="">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-print" aria-hidden="true"></i>Creer une facture</h4>
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
                            <select class="select2 form-control"  name="prestataire" size="6" id="listPrestataire" onchange="GetAbonnement();">
                 </select>
                        </div>
                    </div>
                </div>
                <input type="text" id="billnumber" class="form-control" placeholder="Entrer le numéro du séquence du facture" name="billnumber" >
                           <div class="danger">
                            <p><strong>NB :</strong>Si vous ne remplissez pas le numéro il sera remplis automatique</p>
                          </div>
                </div>
                <div class="table-responsive" >
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Description</th>
                       <th>Nombre</th>
                       <th>Prix</th>
                       <th>Montant HT</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>Abonnement</td>
                       <td>
                         
                       </td>
                       <td>
                        
                       </td>
                      
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="total1" value="0" class="form-control " disabled name="total1">
                           </div>
                         </div>
                       </td>
                     </tr>
                     <tr>
                       <td>Signalement</td>
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="nombre2" value="0" class="form-control " placeholder="" name="q2" oninput="calcul_montant('nombre2','montant2','total2')" >
                           </div>
                         </div>
                       </td>
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="montant2"  value="0" class="form-control " placeholder="" name="p2" oninput="calcul_montant('nombre2','montant2','total2')">
                           </div>
                         </div>
                       </td>
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="total2" value="0" class="form-control " disabled>
                           </div>
                         </div>
                       </td>
                     </tr>
                      <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                      
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             Retrocession :<input type="number" id="r" value="0" class="form-control" oninput="calcul_montant('nombre2','montant2','total2')" required="true" name="retro">
                           </div>
                         </div>
                       </td>
                     </tr>
                     </tr>
                      
                     
                   </tbody>
                 </table>
               </div>
               <div class="row">
                 <div class="col-md-6">

                 </div>
                 <div class="col-md-6">
                   <p>Montant HT : <span id="mht">0 </span> €</p>
                   <p>TVA : <span id="tva">0 </span>€</p>
                   <p>Montant TTC : <span id="mttc">0 </span>€</p>
                 </div>
               </div>
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="AddBill();">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<!-- fin exporter -->


<!--------



  ---->
<div class="content-body">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">liste des factures des clients</h4>
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
              <input type="hidden" name="get_data_id" value="">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>





<?php include "../include/footer.php" ?>

<script type="text/javascript">
 function select_prestataire()
{
  //var code_postal = $('input[name=code_postal]').val().substring(0,2);
 
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

function Show_UI(num)
{
  $('input[name=get_data_id]').val(num);
}

 function send_Email()
{
  $.ajax({
        type:"POST",
        data:{
                num:$('input[name=get_data_id]').val(),
                email:$('input[name=email]').val()
              },
        dataType:'JSON',
        url: "../Actions/Bill_Actions/Send_Mail_Prestataire_Action.php",
        success: function(data){ 

          if(data['success']=='success')
          {
        
           swal("Success","Mail envoyé","success");
           $('input[name=email]').val('');
           
          }
          else alert(data['success']);
        }
      
    });
}

function AddBill()
{
  var num_serie = $('select[name=prestataire]').val();
  var p2 = $('input[name=p2]').val();
  var q2 = $('input[name=q2]').val();
  var retrocession = $('input[name=retro]').val();
  var billnumber = $('#billnumber').val();
  if(billnumber=="")
  {
    swal("Erreur","Le numéro du facture est obligatoire","error");
    return false;
  }
  $.ajax({
        data:{ 
               montant:$('#mht').html(),
               num_serie:num_serie,
               billnumber:billnumber,
               retrocession:retrocession,
               p2:p2,
               q2:q2

           } ,
        type: "post",
        url: "../Actions/Bill_Actions/Add_Bill_Prestataire_Action.php",
        dataType:'JSON',
        success: function(data){
          if(data['success']=='success')
          {
           get_all_data();
           $('#modal-facture-honoraires').modal('hide');
           //swal("Success","Facture est enregistrée avec success","success");
           //location.replace("honoraires.php");
          } 
        }
      });
}

function GetAbonnement()
{
  var code =  $('select[name=prestataire]').val();
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
                  
                  $('input[name=total1]').val(data['success']['abonnement']);
                  calcul_montant('nombre2','montant2','total2');
                  
             }     
        }
      });
}

function search(){
  var filter = $('input[name=search]').val();
  $.ajax({
        type:"POST",
        data:{filter:filter},
        url: "../Actions/Bill_Actions/List_Bill_Prestataire.php",
        success: function(data){
             $('#generer-table').html(data);       
        }
      
    });
}

function get_all_data(){

    $.ajax({
        type:"POST",
        data:{filter:""},
        url: "../Actions/Bill_Actions/List_Bill_Prestataire.php",
        //dataType:"JSON",
        success: function(data){
           
             $('#generer-table').html(data);
            
          
        }
      
    });
  }

  $(document).ready(function(){
    get_all_data();
    select_prestataire();
  })


  function calcul_montant(nombre,montant,total){
    $('#'+total).val($('#'+nombre).val()*$('#'+montant).val());
    var montant = (parseFloat($('#total2').val())+parseFloat($('#total1').val()))-parseFloat($('#r').val());
    $('#mht').html(montant);
    $('#tva').html((montant*1.2)-montant);
    $('#mttc').html(montant*1.2);
  }



 function Payer_Facture(num_serie,date_facture)
  {
    $.ajax({
            type:"POST",
            url:"../Actions/Bill_Actions/Payer_Prestataire_Facture_Action.php",
            dataType:"JSON",
            data:{
                  num:num_serie,
                  date:date_facture
                },
            success:function(){
              get_all_data();
            }
    });
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
