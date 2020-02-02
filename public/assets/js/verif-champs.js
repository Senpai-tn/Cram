
  function verifDate(champs,bouton) {
      var d= $("input[name="+champs+"]").val();
      a = parseInt(d.split("-")[0],10); // année
      datecourante = new Date().getFullYear();

      if (a < 1950 || a > datecourante ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Entrer une date valide');
         //swal("Erreur","Enter un téléphone valide ","error");
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
         $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }

   function verifDateNaissance(champs,bouton) {
      var d= $("input[name="+champs+"]").val();
      a = parseInt(d.split("-")[0],10); // année
      datecourante = new Date().getFullYear();

      if (a < 1950 || a > datecourante-18 ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Entrer une date de naissance valide (âge minimal 18 ans)');
         //swal("Erreur","Entrer une date de naissance valide (âge minimal 18 ans)","error");
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
        $('.notiff').fadeOut(200);
         $("input[name="+champs+"]").css("box-shadow","none");
         $('#'+bouton).removeAttr("disabled");
      }
  }

  function verifTel(champs,bouton) {
      var a = $("input[name="+champs+"]").val();

      if ( (a != '' && a.length < 7) || a.length > 12 || parseInt(a)<0  ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Enter un téléphone valide');
         //swal("Erreur","Enter un téléphone valide ","error");
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }

  function verifCodePostal(champs,bouton) {
      var a = $("input[name="+champs+"]").val();

      if ( a.length != 5 || parseInt(a)<0  ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
         //swal("Erreur","Entrer un code postal valide composé par 4 ou 5 chiffres","error");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Entrer un code postal valide composé par 5 chiffres');
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }
  function verifCin(champs,bouton) {
      var a = $("input[name="+champs+"]").val();

      if ( a.length != 8) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
          $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Entrer un Cin valide composé par 8 chiffres');
         //swal("Erreur","Entrer un Cin valide composé par 8 chiffres","error");
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }
  function verifChaine(champs,min,bouton) {
      var a = $("input[name="+champs+"]").val();

      if ( a.length < min) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> La longeur du champ doit être '+min+' au minimum !');
         //swal("Erreur","La longeur du champ doit être "+min+" au minimum","error");
         $('#'+bouton).attr("disabled","true");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }
  function verifPourcentage(champs,bouton) {
      var a = $("input[name="+champs+"]").val();
      if ( a ==""  ) {
         $("input[name="+champs+"]").val(0);
      }else if ( parseInt(a)>100 || parseInt(a)<0  ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022"); 
         $('#'+bouton).attr("disabled","true");
         //swal("Erreur","Entrer un nombre entre 0 et 100","error");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }
  function verifNumber(champs,bouton) {
      var a = $("input[name="+champs+"]").val();

      if ( a ==""  ) {
         $("input[name="+champs+"]").val(0);
      }else if ( parseInt(a)< 0  ) {
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022"); 
         $('#'+bouton).attr("disabled","true");      
         //swal("Erreur","Entrer un nombre positif","error");
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }

  function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    }else{
      return true;
    }
  }

  function verifEmail(champs,bouton) {
      var a = $("input[name="+champs+"]").val();

       if(IsEmail(a)==false){
         $("input[name="+champs+"]").focus();
         $("input[name="+champs+"]").css("box-shadow","0 0 8px #ff0022");       
         //swal("Erreur","Entrer une email valide","error");
         $('#'+bouton).attr("disabled","true");
         $('.notiff').fadeIn(200);
         $('.notiff').html('<i class="la la-exclamation-circle" style="font-size: 20px;"></i> Entrer une email valide !');
         return false;
      }else{
        $("input[name="+champs+"]").css("box-shadow","none");
        $('.notiff').fadeOut(200);
        $('#'+bouton).removeAttr("disabled");
      }
  }
