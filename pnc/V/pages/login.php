<?php
session_start();
unset($_SESSION['Agent']);
session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>pnc_ituri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
  <body style="background-image:url('../dist/img/photo2.png'); ">
    <div style="padding-top: 8%">
    <div style="text-align: center ">
      <h1 style="font-family: algerian; font-size: 50px; color: green;">BIENVENU DANS NOTRE SITE PNC_ITURI/Nyakasanza</h1>
    </div>
      <div class="card col-sm-6 offset-sm-3 " style="padding: 0px;">
          <div class="card-header"  style="background-color: #4d4d4e;text-align: center margin-left: 0px;margin-right: 0px; margin-top: 20px">
             <h3 class="card-title col-sm-8 offset-sm-4" style="color: white;">CONNECTEZ VOUS ICI</h3>
          </div>
          <form class="form-horizontal" id="Login" role="form"> 
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="Mail" class="col-sm-2 col-form-label"  required>Mail</label>
                      <div class="col-sm-10">
                        <input type="Email" class="form-control" maxlength="35" id="Email" name="Email"   placeholder="Email ici" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Cle" class="col-sm-2 col-form-label">Mot de Passe</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" maxlength="12" id="Cle" name='Cle' placeholder="Mot de passe ici" required>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <input type="button" id="envoi" name="envoi" class="btn btn-success" value='Connexion'>
                    <button type="reset" class="btn btn-default float-right">Annuler</button>
                  </div>
          </form>
          <div id="messages" style=" color: red; text-align: center">
          </div>
    </div>
  </div>
  <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#envoi').click(function(e){
    var Mail  = encodeURIComponent( $('#Email').val() );
    var Cle = encodeURIComponent( $('#Cle').val() );
    // alert(Mail+'  '+Cle);
    if (Mail!="" && Cle!=""){
      // alert(1);
        $.ajax({
            type:'POST',
            url:'../../C/controllogin.php',
            data: $('#Login').serialize(),
            success:function(serveur){
              alert(serveur);
              document.location.href='acceuil.php';
              }
            });
      }
      if(Mail=="" && Cle != ""){
      $('#Email').addClass('is-invalid').removeClass('is-valid');
      $('#Cle').addClass('is-valid').removeClass('is-invalid');
      alert("Merci d'avoir saisi les Mail !");
    }
    if(Mail != "" && Cle == ""){
        $('#Email').addClass('is-valid').removeClass('is-invalid');
      $('#Cle').addClass('is-invalid').removeClass('is-valid');
       alert("Merci d'avoir saisi Mot depasse !");
    }
    if(Mail == "" && Cle == ""){
      $('#Email').addClass('is-invalid').removeClass('is-valid');
      $('#Cle').addClass('is-invalid').removeClass('is-valid');
      alert("Merci d'avoir Rempli les differents Champs de saisi.");
    }                                                                                                                                     
});
  $('#Email').click(function(){
  $('#Mail').removeClass('is-invalid');
  });

  $('#Cle').click(function(){
    $('#Cle').removeClass('is-invalid');
  });
});
</script>
</body>
</html>