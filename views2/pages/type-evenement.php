<?php include "../include/header.php" ?>

<div class="content-header row">
    <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter type d'evenement </a>
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
            <h4 class="card-title">liste des types d'evenement</h4>
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

                    <tr style="color:#00FF00">
                      <td>mot 1</td>
                      <td>Indistruels</td>
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
                    <tr style="color:#FF0000">
                      <td>mot 2</td>
                      <td>Habitations</td>
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
                    <tr style="color:#00FF00">
                      <td>mot 3</td>
                      <td>Indistruels</td>
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

              </div>
              <input type="hidden" name="get_data_id" value="">
              <input type="hidden" name="get_data_name" value="">
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
        <h4 class="modal-title white" id="myModalLabel5">Ajouter un type d'evenement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Mot clé :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1"  class="form-control " placeholder="Mot clé" name="nom">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="timesheetinput2">Groupe de mot clé</label>
                      <div class="position-relative has-icon-left">
                        <select class="select form-control" name="groupe_mot_cle">
                          <option value="INDUSTRIEL">INDUSTRIEL</option>
                          <option value="PARTICULIER">PARTICULIER</option>
                          <option value="AUTRE">AUTRE</option>
                        </select>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="Add_Event()">Ajouter</button>

      </div>
    </div>
  </div>
</div>

<!-- supprimer -->
<div class="modal fade text-left" id="modal3" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer type d'evenement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet type d'evenement ?</p>
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
        <h4 class="modal-title white" id="myModalLabel5">Modifier un type d'evenement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">mot clé :</label>
                      <div class="position-relative has-icon-left">

                        <input type="text" class="form-control" placeholder="nom" name="new_nom" id="userinput1">
                        <div class="form-control-position" >
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
        <button type="button" class="btn btn-primary" onclick="Confirm_Update()" >Modifier</button>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php" ?>


<script language="javascript">


 function Add_Event()
 {
    var nom = $('input[name=nom]').val();
    var groupe_mot_cle = $('select[name=groupe_mot_cle]').val();
       $.ajax({
        data: jQuery.param({ nom: nom, groupe_mot_cle }) ,
        type: "post",
        url: "../Actions/Events_Actions/addEvent_Action.php",
        success: function(data){
          get_all_data();
           $('#modal1').modal('hide');
           swal("Success","Modification est terminée avec success","success");
        }
      });
  }

 function get_one_event(id){
        $.ajax({
            type:"POST",
            url: "../Actions/Events_Actions/Get_Event_Action.php",
            data:{id_event:id},
            dataType:"json",
            success: function(data){
                if(data['success'] != null)
                {
                  $('input[name=get_data_id').val(id);

                  $('input[name=new_nom]').val(data['success']['nom']);
                }

              }

        });
  }



  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "../Actions/Events_Actions/List-Event_Action.php",
        //dataType:"JSON",
        success: function(data){

             $('#generer-table').html(data);


        }

    });
  }


  $(document).ready(function(){

      get_all_data();
  });



  function confirmDelete()
  {
    var id = $('input[name=get_data_id').val();
    $.ajax({
            type:"POST",
            url: "../Actions/Events_Actions/Delete_event_Action.php",
            data: jQuery.param({ id_event:id }) ,
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

  function delete_row_UI(id)
  {

    $('#modal3').modal('show');
    $('input[name=get_data_id').val(id);

  }


  function Update_row_UI(id)
  {
    get_one_event(id);

    $('#modal2').modal('show');
  }



  function Confirm_Update()
  {

    var id_event=$('input[name=get_data_id').val();
    var nom =    $('input[name=new_nom]').val();

    $.ajax({
                type:"POST",
                url: "../Actions/Events_Actions/Update_event_Action.php",
                data:{id_event:id_event,nom:nom},
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



/*
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
*/
  function Export_XLS(){

          var excel_data = encodeURIComponent($('#generer-table').html());


          location.replace("exel.php?data="+excel_data);

 }
</script>
