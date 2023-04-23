$(document).ready(function(){
  $('#resultat').hide(); 
});
function rechercheentre(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlentree.php?RechEntree="+cle,
            success:function(serveur)
            {
              // alert(serveur);
              $("#div_tab").html('');
              $("#div_tab").html(serveur);
            }
        });  
}
function verifcmd(id){
  // alert(id);
   $.ajax({
    type:'get',
    url:'../../C/controlentree.php?verifcommande='+id,
    success:function(e){
      // alert(e);
     $('#commande').html('');
      $('#commande').html(e);
    }
  });
}
function ajouterentree(){
  // alert(2222);
  $.ajax({
      type:'POST',
      url:'../../C/controlentree.php',
      data: $('#formentree').serialize(),
      success:function(serveur){
        // alert(serveur);
        if(serveur==1){
          rechercheentre('');
          annuler02();
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
          verifcmd("");
        }else{
          $('#resultat').css('color','red').text("Oops ! EChec. Merci de Remplire tout les champs avec les informations correctes !");
          $('#resultat').show();
        }
       
      } 
    });
}

//REcuperation du fomulaire rempl
function RecModifEntre(identree){
  // alert(identree);
  $.ajax({
      type:'get',
      url:'../../C/controlentree.php?IdModEnt='+identree,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frm_entree').html('');
          $('#frm_entree').html(serveur);
          $('#resultat').css('color','red').text("Modification !");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
//Enregistrement modification

function Enregismodentree(id){
  verifcmd('');
  $.ajax({
      type:'POST',
      url:'../../C/controlentree.php?IdEngMod='+id,
      data: $('#formentreeMdf').serialize(),
      success:function(serveur){
          rechercheentre('');
    
          $('#resultat').css('color','red').text("Verifier si la modification a bien reussi");
          $('#resultat').fadOut(9999);
          $('#resultat').fadeOut('slow');
          $('#resultat').fadIn(9999);
          $('#resultat').fadeIn('slow');

      } 
    });
}


function supprimerentree(id){
  verifcmd('');
	$.ajax({
		type:'get',
		url:'../../C/controlentree.php?EntrSup='+id,
    success:function(server){
      if(server==1){
        rechercheentre('');
        alert("Suppression réussie !");
      }else{
        alert("Suppression echoué !");
      }
    }
	})
}


function verifMotEntre(mot,idCom){
  // alert(mot+'....'+idCom);
   $.ajax({
    type:'get',
    url:'../../C/controlentree.php?VeriMt='+mot+'&IdCom='+idCom,
    success:function(e){
      // alert(e);
      if(e>=0 && e!='vide'){
         //Foction ajout
          $('#qte_arm').css('color','green');
         $('#qte_arm').css('border-color','green');
         $('#enrecom').fadeIn(1000);
         $('#enrecom').fadeIn('slow');
         $('#resultat').fadeOut(1000);
         $('#resultat').fadeOut('slow');
      }else{
         $('#qte_arm').css('color','red');
         $('#qte_arm').css('border-color','red');
          
         
         $('#enrecom').hide();
         $('#resultat').text("Ops! L ENTREE EST SUPERIER A LA COMMANDE").css('color','red');
          

      }
    
      
    }
  });
}
function annuler02(){
  $.ajax({
    type:'get',
    url:'../../C/controlentree.php?annuler02=1',
    success:function(e){
     $('#frm_entree').html('');
      $('#frm_entree').html(e);
    }
  });
}