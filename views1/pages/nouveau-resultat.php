<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Résultats</h3>
    </div>
</div>
<div class="content-body container">
	<div class="row match-height justify-content-md-center">
	    <div class="col-xl-6 col-lg-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-basic">Ajouter un résultat d'analyse</h4>
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
	            <div class="card-content collpase show">
	                <div class="card-body">
	                    <form class="form form-horizontal" id="form-result"> 
	                    	<div class="form-body">	                    		

								<h4 class="form-section"><i class="ft-clipboard"></i> Données du résultat</h4>

		                        <div class="form-group row">
		                        	<label class="col-md-3 label-control" for="projectinput6">Client</label>
		                        	<div class="col-md-9">
			                            <select id="liste-clients" name="client" class="select2 form-control">
			                            </select>

		                            </div>
		                        </div>

								<div class="form-group row">
									<label class="col-md-3 label-control">Résultat de l'analyse</label>
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
									</div>
								</div>
							</div>

	                        <div class="form-actions right">
	                            <button type="reset" class="btn btn-danger mr-1">
	                            	<i class="ft-x"></i> Annuler
	                            </button>
	                            <button type="button" onclick="add_result();" class="btn btn-primary">
	                                <i class="la la-check-square-o"></i> Ajouter
	                            </button>
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
      get_all_clients();
  });

  function add_result(){
    var client = $('select[name=client]').val();
	var file = $('input[name=file]').val();
	var formData = new FormData($("#form-result")[0]);
      if(client  &&file ){
          $.ajax({
                type:"POST",
                url: "add_result",
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
	                  window.location = "liste-des-resultats";
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
    }
</script>
