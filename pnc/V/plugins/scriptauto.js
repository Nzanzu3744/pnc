$(document).ready(function(){
  $('#resultat').hide();
  $("#infoagent").hide(); 
  $("#infoarme").hide(); 
});
function AgentInfo(cle){
  controlAgent(cle);
  $.ajax({
            type : "GET", 
            url : "../../C/controlauto.php?RechAgent="+cle,
            success:function(serveur)
            {
              $("#infoagent").show();
              $("#infoagent").html('');
              $("#infoagent").html(serveur);
            }
        });  
}
function controlAgent(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlauto.php?verifAgent="+cle,
            success:function(serveur)
            {
              
              if(serveur==1){
              $("#divEnregAuto").show();
              $("#agent").css('border-color','green');
              $("#agent").css('color','green');
              $("#infoagent").css('color','green');
            }else{
              $("#divEnregAuto").hide();
              $("#agent").css('border-color','red');
              $("#agent").css('color','red');
              $("#infoagent").css('color','red');
            }
            }
        });  
}
function verifstock(cle){
  // alert (777);
  $.ajax({
            type : "GET", 
            url : "../../C/controlauto.php?verifstock="+cle,
            success:function(serveur)
            {
              // alert('ok'); 
           if(serveur>0){
            $("#divEnregAuto").show();
              $("#infoarme").show();
              $("#infoarme").html('');
              $("#infoarme").html("<p style='font-size:20px; color:green'>Solde Total :"+serveur+"</p>");
              $("#arme").css('color','green');
              $("#arme").css('border-color','green');
          }else{
            
            $("#divEnregAuto").hide();
             $("#infoarme").show();
              $("#infoarme").html('');
              $("#infoarme").html("STOCK VIDE").css('color','red');
              $("#arme").css('color','red');
              $("#arme").css('border-color','red');
          }
            
            }
        });
}

function ajouterauto(){
  $.ajax({
    data: $('#formauto').serialize(),
      type:'POST',
      url:'../../C/controlauto.php',
      success:function(serveur){
        if(serveur==true){
          rechercheauto('');
          // annuler01();
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
function RecAuto(id){
  // alert(id);
  $.ajax({
      type:'post',
      url:'../../C/controlauto.php?RecIdModAut='+id,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frm_Aut').html('');
          $('#frm_Aut').html(serveur);
          $('#resultat').css('color','green').text("Selection pour modification");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
// //Enregistrement modification
function ModifierAuto(A){
 // alert(A);
  $.ajax({
      type:'POST',
      url:'../../C/controlauto.php?idAutoriEnrg='+A,
      data: $('#formauto').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==1){
          RecAuto('');
          rechercheauto('');
          $('#resultat').css('color','green').text("Modification reussi");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    })
}



function SuprimerA(id){
  // alert(id);
	$.ajax({
		type:'get',
		url:'../../C/controlauto.php?supAuto='+id,
    success:function(server){
      if(server==1){
        rechercheauto('');
        alert("Suppression réussie !");
      }else{
        alert("Suppression echoué !");
      }
    }
	})
}

function rechercheauto(varible){
  $.ajax({
    type: 'get',
    url:'../../C/controlauto.php?rechAut='+varible,
    success:function(e){
      $('#div_Auto01').html('');
      $('#div_Auto01').html(e);
    }
  });
}

function annuler01(){
  $.ajax({
    type: 'get',
    url:'../../C/controlagent.php?annuler=1',
    success:function(e){
      $('#frm_Agent').html('');
      $('#frm_Agent').html(e);
    }
  });
}