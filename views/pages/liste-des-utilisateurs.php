<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Utilisateurs</h3>
    </div>
</div>



<div class="content-body">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">liste des utilisateurs</h4>
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
                <!-- le tableau est généré automatiquement ici -->
              </div>
              <input type="hidden" name="get_data_id" value="">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>



<!-- supprimer -->
<div class="modal fade text-left" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer utilisateur</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet utilisateur ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="delete_row();">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="show1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-success white">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-pencil-square" aria-hidden="true"></i> Modifier utilisateur</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées d'utilisateur</h4>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Type d'utilisateur :</label>
                        <div class="position-relative has-icon-left">
                          <select name="type_utilisateur2" class="form-control">
                              <option value="simple-user">Simple utilisateur</option>
                              <option value="admin">Admin</option>
                          </select>
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="timesheetinput2">Nom et prénom :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1" onblur="verifChaine('nom2',5,'edit-user')" class="form-control " placeholder="Nom et prénom" name="nom2">
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
                        <label for="timesheetinput1">E-mail : </label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userinput2" onblur="verifEmail('email2','edit-user')" class="form-control " placeholder="E-mail" name="email2">
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
                        <input type="number" id="userinput1" onblur="verifTel('telephone2','edit-user')" class="form-control " placeholder="Téléphone" name="telephone2">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
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
        <button type="button" onclick="update();" id="edit-user" class="btn btn-success">Modifier</button>
      </div>
    </div>
  </div>
</div>

        

<?php include "../include/footer.php" ?>


<script>

  function get_all_data(){
    $.ajax({
        type:"POST",
        url: "liste-utilisateurs",
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
            url: "get_one_user",
            data:{id:id},
            dataType:"json",
            success: function(data){
              if (data.msg ==  'echec'){
                  swal("Erreur","Erreur lors de recheche utilisateur","error");
              }else {
                  $('input[name=nom2]').val(data.msg.nom);
                  // $('input[name=cin2]').val(data.msg.cin);
                  $('input[name=email2]').val(data.msg.email);
                  $('input[name=telephone2]').val(data.msg.telephone);
                  $('select[name=type_utilisateur2]').val(data.msg.type_compte);
                  
              }
            }
        });
    }else{
      $('input[name=nom2]').val();
      // $('input[name=cin2]').val();
      $('input[name=email2]').val();
      $('input[name=telephone2]').val();
      $('select[name=type_utilisateur2]').val();
    }

  }


  // delete this row
  function delete_row(){
    var id= $('input[name=get_data_id]').val();
    if(id != ""){
        $.ajax({
            type:"POST",
            url: "delete_user",
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
      swal("Erreur","Aucun utilisateur séléctioné","error");
    }
  }


  // modifier user
  function update(){
    var type_compte = $('select[name=type_utilisateur2]').val();
    // var cin = $('input[name=cin2]').val();
    var nom = $('input[name=nom2]').val();
    var telephone = $('input[name=telephone2]').val();
    var email = $('input[name=email2]').val();
    var id= $('input[name=get_data_id]').val();
    if(id != ""){
        if(type_compte &&nom &&telephone &&email ){
            $.ajax({
                type:"POST",
                url: "update_user",
                data:{id:id,type_compte:type_compte, nom:nom, telephone:telephone,email:email},
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
        swal("Erreur","Aucun utilisateur séléctioné","error");
    }
  }


</script>