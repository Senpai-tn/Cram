<?php include "../include/header.php" ?>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Récapitulatif</h3>
       
    </div>
    <!-- <div class="content-header-right col-md-8 col-12">
      <div class="float-md-right">
        <div class="dropdown">
          <button class="btn btn-glow btn-bg-gradient-x-purple-red col-12 round  mr-1 mb-1v dropdown-toggle"  id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions <span class="fa fa-ellipsis-h"></span></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="right-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Ajouter prestataire </a>
            <a class="dropdown-item" href="#">Exporter excel</a>
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
          <h4 class="card-title" id="basic-layout-icons">Date de facturation</h4>
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
                      <label for="timesheetinput2">Date de facturation :</label>
                      <div class="position-relative has-icon-left">
                        <input type="month" id="userinput1"  class="form-control " placeholder="Nom" name="begin_date" >
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
                        <button type="button" id="add-user" onclick="get_all_data()" class="btn btn-primary">
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


<div class="content-body">
  <section id="base-style">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Récapitulatif des prestataires</h4>
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

              </div>
              <input type="text" name="get_data_id" value="">
              <input type="text" id="get_list_id" value="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


<!-- modifier -->
<div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
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
                            <input type="text" id="name" class="form-control" name="name" disabled>
                        </div>
                    </div>
                </div>
                </div>
                <div class="table-responsive" id="generer-table">
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
                       <td></td>
                       <td></td>
                      
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="total1" value="0" class="form-control " disabled>
                           </div>
                         </div>
                       </td>
                     </tr>
                     <tr>
                       <td>Signalement</td>
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="nombre2" value="0" class="form-control " placeholder="" name="p2" oninput="calcul_montant('nombre2','montant2','total2')" >
                           </div>
                         </div>
                       </td>
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             <input type="number" id="montant2"  value="0" class="form-control " placeholder="" name="q2" oninput="calcul_montant('nombre2','montant2','total2')">
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
                             Retrocession :<input type="number" id="r" value="0" class="form-control" oninput="calcul_montant('nombre2','montant2','total2')" required="true">
                           </div>
                         </div>
                       </td>
                     </tr>
                     </tr>
                      <tr>
                       
                      
                       <td>
                         <div class="form-group">
                           <div class="position-relative has-icon-left">
                             Les informations refusées :
                             <select class="select2 form-control" multiple="multiple" name="listInfo" size="6" id="listInfo" >
                 </select>
                           </div>
                         </div>
                       </td>
                       <td></td>
                       <td></td>
                       <td></td>
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
        <button type="button" class="btn btn-primary" onclick="Add_bill()">Facturer</button>
        <button type="button" target="_blank" class="btn btn-primary" onclick="Export_PDF()">Exporter PDF</button>
        <button type="button" class="btn btn-primary" onclick="Export_Exel()">Exporter Exel</button>
      </div>
    </div>
  </div>
</div>



<?php include "../include/footer.php" ?>



<script type="text/javascript">
function Export_PDF()
{
  location.replace("../Actions/Bill_Actions/Bill_Prestataire_PDF.php?n_sequence="+$('#get_list_id').val());
}

function Export_Exel()
{
  location.replace("../Actions/Exel_Maker/Recapitulatif_Prestataire.php?n_sequence="+$('#get_list_id').val());
}

function get_prestataire(num_serie,name)
{

  $('input[name=get_data_id]').val(num_serie);
  $('#name').val(name);

}





function Select_Information(num_serie)
{ 
  
  $.ajax({
        type:"POST",
        data:{num_serie:num_serie},
        url: "../Actions/Information_Actions/Select_Information_prestataire_Action.php",
        success: function(data){
            $('#listInfo').html(data); 
        }
      
    });
}

function get_all_data()
{
  var begin_date = $('input[name=begin_date]').val();
    $.ajax({
        type:"POST",
        url: "../Actions/Recapitulatif_Actions/List_Prestataire_Action.php",
        data:{begin_date:begin_date},
        //dataType:"JSON",
        success: function(data){
             $('#generer-table').html(data);
        }
      
    });
  }

  $(document).ready(function(){
    $('input[name=begin_date]').val(new Date().getFullYear()+'-'+(new Date().getMonth() + 1));
  })

function Add_bill()
{
  var p2 = $('input[name=p2]').val();
  var q2 = $('input[name=q2]').val();
  var id = $('#listInfo').val()+"";
  var listID = $('#get_list_id').val();
  var num_serie = $('input[name=get_data_id]').val();
  var retrocession = $('#r').val();
  $.ajax({
        data:{ 
               montant:$('#mttc').html(),
               num_serie:num_serie,
               id:id,
               listID:listID,
               date_facture:$('input[name=begin_date]').val(),
               retrocession:retrocession
           } ,
        type: "post",
        url: "../Actions/Bill_Actions/Add_Bill_Prestataire_Action.php",
        dataType:'JSON',
        success: function(data){
          if(data['success']=='success')
          {
           get_all_data();
           $('#modal-edit').modal('hide');
           swal("Success","Facture est enregistrée avec success","success");
           location.replace("honoraires.php");
          } 
        }
      });
}

function Show_UI(a,n,p,t,mht,listID)
{
  $("#nombre2").val(n);
  $("#montant2").val(p);
  $("#total2").val(t);
  $("#total1").val(a);
  $("#get_list_id").val(listID);
  calcul_montant('nombre2','montant2','total2');

}


  
  function calcul_montant(nombre,montant,total){
    $('#'+total).val($('#'+nombre).val()*$('#'+montant).val());
    var montant = (parseFloat($('#total2').val())+parseFloat($('#total1').val()))-parseFloat($('#r').val());
    $('#mht').html(montant);
    $('#tva').html((montant*1.2)-montant);
    $('#mttc').html(montant*1.2);
  }


</script>