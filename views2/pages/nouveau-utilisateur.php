<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Utilisateurs</h3>
    </div>
</div>
<div class="content-body container">
	<div class="row match-height justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-icons">Ajouter un nouveau utilisateur</h4>
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

						<form class="form">
              <div class="form-body">
                <h4 class="form-section"></i> Coodronnées d'utilisateur</h4>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="timesheetinput1">Type d'utilisateur :</label>
                        <div class="position-relative has-icon-left">
                          <select name="type_compte" class="form-control">
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
                        <input type="text" id="userinput1" onblur="verifChaine('nom',5,'add-user')" class="form-control " placeholder="Nom et prénom" name="nom">
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
                          <input type="text" id="userinput2" onblur="verifEmail('email','add-user')" class="form-control " placeholder="E-mail" name="email">
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
                        <input type="number" id="userinput1" onblur="verifTel('telephone','add-user')" class="form-control " placeholder="Téléphone" name="telephone">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <h4 class="form-section"><i class="ft-mail"></i> Information du compte utilisateur</h4>
                <div class="row">
                  <p class="m-1">De raison de sécurité, <mark>le login</mark> el <mark>le mot de passe</mark> sont généres automatiquement lors de l'ajout cet utilisateur et sont envoyés à <mark>l'email </mark>correspant à cet utilisateur</p>
                </div>
              </div>

              <div class="form-actions right">
                <button type="reset" class="btn btn-danger mr-1">
                  <i class="ft-x"></i> Annuler
                </button>
                <button type="button" id="add-user" onclick="add_user();" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> Ajouter
              </div>
            </form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "../include/footer.php" ?>

<script>



  function add_user(){
    var type_compte = $('select[name=type_compte]').val();
    var nom = $('input[name=nom]').val();
    var telephone = $('input[name=telephone]').val();
    var email = $('input[name=email]').val();
      if(type_compte  &&nom &&telephone &&email ){
          $.ajax({
              type:"POST",
              url: "add_user",
              data:{type_compte:type_compte, nom:nom, telephone:telephone,email:email},
              dataType:"json",
              success: function(data){
                if (data.msg ==  'success'){
                  window.location = "liste-des-utilisateurs";
                }else if(data.msg == "email-exist") {
                  swal("Erreur","E-mail existe déjà ! , réesseyer ","error");
                }else {
                  swal("Erreur","L'opération est echoué , réesseyer ","error");
                }

              }
            
          });

        
      }else{
          swal("Erreur","Tous les champs doivent êtres remplis","error");
      }
    }
</script>