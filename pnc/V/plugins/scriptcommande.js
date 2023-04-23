$(document).ready(function(){
  $('#resultat').hide();
  $("#infoagent").hide(); 
  $("#infoarme").hide(); 
});
function commande(id){
  // alert(id);
  $.ajax({
    type:'get',
    url:'../../C/controlcommande.php?materiel='+id,
    success:function(serveur){
      // alert(serveur);
      if(serveur!=0){
      $('#formCommande').html('');
      $('#formCommande').html(serveur);
    }else{
      $('#formCommande').html('');
      $('#formCommande').html('<div style="margin-top:150px;color:green;text-align:center"><i>MERCI DE SELECTIONNER LE MATERIEL DANS LE TABLEAU CI HAUT</i></div>');
    }
  }

  });
}
function ajoutercommande(arme){
  // alert(arme);
  $.ajax({
    type:'POST',
    url:'../../c/controlcommande.php?Comm_arme='+arme,
    data:$('#formcommande').serialize(),
    success:function(serveur){
      alert(serveur);
      if(serveur==1){
        verifcmd("");
      }
    }
    });
}
function SuprimerCommande(idcom){
  
  $.ajax({
    type:'get',
    url:'../../c/controlcommande.php?comSup='+idcom,
    success:function(serveur){
      if(serveur==1){
        verifcmd("");
        alert("Suppression Reussi !");
      }else{
        alert('Oups !  Echec de suppression! Cette commande doit etre lie a une entree stock');
      }
    }
    });
}
function ModifierCommande(commande){
  // alert(commande);
   $.ajax({
    type:'get',
    url:'../../c/controlcommande.php?comMod='+commande,
    success:function(serveur){
      alert(serveur);
      if(serveur!=''){
      $('#formCommande').html('');
      $('#formCommande').html(serveur);
    }else{
      $('#formCommande').html('');
      $('#formCommande').html('<div style="margin-top:150px;color:green;text-align:center"><i>MERCI DE SELECTIONNER LE MATERIEL DANS LE TABLEAU CI HAUT</i></div>');
    }
    }
    });
}
function ConfirmModifiierCom(idCom,arme,qt_Com){
  $.ajax({
    type:'POST',
    url:'../../c/controlcommande.php?arme6575='+arme+'&Idcomm987='+idCom+'&qt_Com='+qt_Com,
    success:function(serveur){
      // alert(serveur);
      if(serveur==1){
        verifcmd("");
      }else{
        alert('Modification echouée !');
      }
    }
    });
}
//
