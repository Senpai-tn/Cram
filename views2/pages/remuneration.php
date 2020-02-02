<?php include "../include/header.php" ?>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Rémunération</h3>
    </div>
    <!-- <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter type de facture </a>
          </div>
        </div>
      </div>
    </div> -->
</div>


<div class="content-body container">
  <div class="row match-height justify-content-md-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-icons">Rémunération</h4>
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="timesheetinput2">Date de début :</label>
                      <div class="position-relative has-icon-left">
                        <input type="date" id="userinput1" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="Nom" name="begin_date">
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
                        <label for="timesheetinput2">Date de fin :</label>
                        <div class="position-relative has-icon-left">
                          <input type="date" id="userinput1" onblur="verifDate('nom',3,'add-user')" class="form-control " placeholder="Nom" name="end_date">
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
                        <button type="button" id="add-user" onclick="search()" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Recherche
                        </button>
                      </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- resultat -->
<div class="content-body" id="resultats">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Liste des informations :</h4>
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
              
              
              <div class="row" id="generer-table">
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


<!-- supprimer -->
<div class="modal fade text-left" id="modal3" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger ">
        <h4 class="modal-title white" id="myModalLabel5"><i class="la la-trash" aria-hidden="true"></i>Supprimer type de facture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cet type de facture ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" onclick="delete_row();">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-primary ">
        <h4 class="modal-title white" id="myModalLabel5">Modifier un type de facture</h4>
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
                      <label for="timesheetinput2">Type :</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="userinput1" onblur="verifChaine('nom',5,'add-user')" class="form-control " placeholder="nom et prenom" name="nom">
                        <div class="form-control-position">
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
        <button type="button" class="btn btn-primary" onclick="delete_row();">Modifier</button>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php" ?>
<script type="text/javascript">
  function search()
{
  
  var begin_date = $('input[name=begin_date]').val();
  var end_date = $('input[name=end_date]').val();

  
  $.ajax({
        type:"POST",
        data:{
         
          begin_date:begin_date,  
          end_date:end_date
       
        },
        url: "../Actions/Information_Actions/Show_Remuneration_Action.php",
        success: function(data)
        {
           
              $('#generer-table').html(data);
  
        }
      });

}
</script>


