<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Moyen hydraulique</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter moyen hydraulique </a>
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
            <h4 class="card-title">liste des moyen hydraulique</h4>
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
                      <th>Chiffre</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>00001</td>
                      <td>95000</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>00001</td>
                      <td>95000</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>00001</td>
                      <td>95000</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="fa fa-ellipsis-h"></span></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Modifier</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              
              <input type="hidden" name="get_data_old_code">
              <input type="hidden" name="get_data_chiffre"  >

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>



<div class="modal fade text-left" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5">Ajouter un moyen hydraulique</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Code :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="code" class="form-control " placeholder="Code" name="code">
                        <div class="form-control-position">
                          <i class="la la-copyright"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Chiffre :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="chiffre" class="form-control " placeholder="Chiffre" name="chiffre"  >
                        <div class="form-control-position">
                          <i class="la la-file-text"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        
        <button onclick="new_m()" id="add_moyen" class="btn btn-primary">Ajout</button>
      </div>
    </div>
  </div>
</div>

<!-- supprimer -->
<div class="modal fade text-left" id="modal3" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer moyen hydraulique</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet moyen hydraulique ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5">Modifier un moyen hydraulique</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Code :</label>
                      <div class="position-relative has-icon-left">
                        
                        
                        <input type="text" class="form-control" name="new_code" value="" placeholder="Code" >
                        <div class="form-control-position">
                          <i class="la la-copyright"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Chiffre :</label>
                      <div class="position-relative has-icon-left">
                          <input type="text" name="new_chiffre" class="form-control" value=""  placeholder="Chiffre" >
                        <div class="form-control-position">
                          <i class="la la-file-text"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>


            
      </div>
      <div class="modal-footer">

        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>

        <button type="button" id='update' class="btn btn-primary" onclick="Confirm_Update()">Modifier</button>
      </div>
    </div>
  </div>
</div>






<?php include "../include/footer.php" ?>
<script language="javascript">
function get_value(str)
{
  return ($('input[name='+str+']').val());
}

function new_m()
 {
    var code = get_value('code');
    var chiffre = get_value('chiffre'); 
  
    
       $.ajax({
        data: jQuery.param({ code: code, chiffre:chiffre }) ,
        type: "post",
        url: "../Actions/Moyen_Actions/Add_moyen_Action.php",
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

  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "../Actions/Moyen_Actions/List_Moyen_Action.php",
        success: function(data){
           
             $('#generer-table').html(data);
            
          
        }
      
    });
  }

   $(document).ready(function(){
      get_all_data();  
  });


function Update_row_UI(code)
{
  get_one_moyen(code);
  $('#modal2').modal('show');
}

function get_one_moyen(code){
        $.ajax({
            type:"POST",
            url: "../Actions/Moyen_Actions/Get_Moyen_Action.php",
            data:{code:code},
            dataType:"json",
            success: function(data){
                if(data['success'] != null)
                {
                  $('input[name=get_data_old_code').val(code);
                  $('input[name=new_code').val(data['success']['code']);
                  $('input[name=new_chiffre').val(data['success']['chiffre']); 
                  
                }
              
              }
            
        });
  }

  function Confirm_Update()
  {

    var new_code=get_value('new_code');
    var old_code=get_value('get_data_old_code');
    var chiffre =get_value('new_chiffre');
    $.ajax({
                type:"POST",
                url: "../Actions/Moyen_Actions/Update_moyen_Action.php",
                data:{old_code:old_code,new_code:new_code,chiffre:chiffre},
                dataType:"json",
                success: function(data){
                  if (data['success'] ==  'success'){
                    get_all_data();
                      $('#modal2').modal('hide');
                      
                      swal("Success","Modification est terminée avec success","success");
                  }else {
                      swal("Erreur","L'opération est echoué, réesseyer ","error");
                  }


                }

            });

  }

function delete_row_UI(id)
  {

    $('#modal3').modal('show');
    $('input[name=get_data_old_code').val(id);
        
  }

  function confirmDelete()
  {
    var code = get_value('get_data_old_code');
    $.ajax({
            type:"POST",
            url: "../Actions/Moyen_Actions/Delete_Moyen_Action.php",
            data: { code:code } ,
            dataType:"json",
            success: function(data){
              if (data['success'] ==  'success'){
                  get_all_data();
                  $('#modal3').modal('hide');
                  swal("Success","Suppression est terminée avec success","success");
              }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
              }
            }
        });
  }


  function Export_XLS(){  
      
          var excel_data = encodeURIComponent($('#generer-table').html());  
          location.replace("../Actions/Exel_Maker/Moyen.php");          
 }
</script>

<!--
<script language="javascript">

function new_m()
 {
    //var code = $('input[name=code]').val();
   // var chiffre = $('input[name=chiffre]').val(); 
    alert('code');   
       $.ajax({
        data: jQuery.param({ code: code, chiffre:chiffre }) ,
        type: "post",
        url: "../Actions/Moyen_Actions/Add_moyen_Actions",
        success: function(data){
          if(data['success'] == 'success')
          {
            //get_all_data();
            $('#modal1').modal('hide');
            swal("Success","Modification est terminée avec success","success");
          }
        }
      });
  }

/*
  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "liste-clients",
        dataType:"json",
        success: function(data){
          $('#generer-table').html(''); 
          $('#generer-table').append(data.msg); 
        }
      
    });
  }


  $(document).ready(function(){ 
      get_all_data();
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
            url: "get_one_clients",
            data:{id:id},
            dataType:"json",
            success: function(data){
              if (data.msg ==  'echec'){
                  swal("Erreur","Erreur lors de recheche client","error");
              }else {
                  $('input[name=nom]').val(data.msg.nom);
                  // $('input[name=cin2]').val(data.msg.cin);
                  $('input[name=prenom]').val(data.msg.prenom);
                  $('input[name=telephone]').val(data.msg.telephone);
                  $('input[name=date_naissance]').val(data.msg.date_naissance);
                  
              }
            }
        });
    }else{
      $('input[name=nom]').val();
      // $('input[name=cin2]').val();
      $('input[name=prenom]').val();
      $('input[name=telephone]').val();
      $('input[name=date_naissance]').val();
    }

  }


  // delete this row
  function delete_row(){
    var id= $('input[name=get_data_id]').val();
    if(id != ""){
        $.ajax({
            type:"POST",
            url: "delete_clients",
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
      swal("Erreur","Aucun client séléctioné","error");
    }
  }


  // modifier user
  function update(){
      var nom = $('input[name=nom]').val();
      var prenom = $('input[name=prenom]').val();
      var telephone = $('input[name=telephone]').val();
      var date_naissance = $('input[name=date_naissance]').val();
       var id= $('input[name=get_data_id]').val();
    if(id != ""){
        if(prenom  &&nom &&telephone &&date_naissance ){
            $.ajax({
                type:"POST",
                url: "update_clients",
                data:{id:id,nom:nom, prenom:prenom, telephone:telephone, date_naissance:date_naissance},
                dataType:"json",
                success: function(data){
                  if (data.msg ==  'success'){
                      $('#show1').modal('hide');          
                      get_all_data();
                      swal("Success","Modification est terminée avec success","success");
                  }else {
                      swal("Erreur","L'opération est echoué , réesseyer ","error");
                  }

                }
              
            });

          
        }else{
            swal("Erreur","Tous les champs doivent êtres remplis","error");
        }
    }else{
        swal("Erreur","Aucun client séléctioné","error");
    }
  }


</script>