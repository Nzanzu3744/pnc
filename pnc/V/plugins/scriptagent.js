$(document).ready(function(){
  $('#resultat').hide(); 
});

function rechercheagent(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlagent.php?RechAgent="+cle,
            success:function(serveur)
            {
              $("#div_tab").html('');
              $("#div_tab").html(serveur);
            }
        });  
}
function ajouteragent(){
  $.ajax({
      type:'POST',
      url:'../../C/controlagent.php',
      data: $('#formagent').serialize(),
      success:function(serveur){
        // alert(serveur);
        if(serveur==1){
          rechercheagent('');
          annuler01();
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          $('#resultat').css('color','red').text("L'enregistrement echoué!");
          $('#resultat').show();
        }
       
      } 
    });
}

//REcuperation du fomulaire rempl
function RecModifAgent(idagent){
  // alert(idagent);
  $.ajax({
      type:'get',
      url:'../../C/controlagent.php?IdModAg='+idagent,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frm_Agent').html('');
          $('#frm_Agent').html(serveur);
          $('#resultat').css('color','green').text("Selection pour modification");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
//Enregistrement modification
function modAgent(A){
 
  $.ajax({
      type:'POST',
      url:'../../C/controlagent.php?idagentMod='+A,
      data: $('#formagentMof').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==1){
          rechercheagent('');
          annuler01();
          $('#frm_Agent').html('');
          $('#frm_Agent').html(serveur);
          $('#resultat').css('color','green').text("Modification reussi");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }else{
          $('#resultat').show();
          $('#resultat').css('color','red').text("Oups ! Echec d'enregistrement .");
        }
      } 
    })
}


function supprimeragent(id){
  // alert(id);
	$.ajax({
		type:'get',
		url:'../../C/controlagent.php?numeagentsup='+id,
    
    success:function(server){
      // alert(server);
      if(server == true){
        rechercheagent('');
        console.log(server);
        alert("Suppression réussie !");
      }else{
        console.log(server);
        rechercheclient('');
        alert("Suppression echoué !");
      }
    }
	})
}
function annuler01(){
  $.ajax({
    type: 'get',
    url:'../../C/controlagent.php?annuler=1',
    success:function(e){
      // alert(e);
      $('#frm_Agent').html('');
      $('#frm_Agent').html(e);
    }
  });
}