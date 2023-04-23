$(document).ready(function(){
  $('#resultat').hide();
});

//
function recherchesolde(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlsortie.php?RechSolde="+cle,
            success:function(serveur)
            {
              // alert(serveur);
              $("#div_Solde").html('');
              $("#div_Solde").html(serveur);
            }
        });  
}

function recherchesortie(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlsortie.php?RechSortie="+cle,
            success:function(serveur)
            {
              // alert(serveur);
              $("#div_tab").html('');
              $("#div_tab").html(serveur);
            }
        });  
}
function ajoutersortie(idA){
  // alert(idA);
  $.ajax({
      type:'POST',
      url:'../../C/controlsortie.php?arme='+idA,
      data: $('#formsortie').serialize(),
      success:function(serveur){
        // alert(serveur);
        if(serveur==1){
          recherchesolde('');
          recherchesortie('');
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          $('#resultat').css('color','red').html("Ops! Echec.<br><i>MERCI DE REMPLIR TOUT LES CHAMPS!</i>");
          $('#resultat').show();
        }
       
      } 
    });
}

// //REcuperation du fomulaire rempl
function RecModifSortie(idSortie){
  // alert(idSortie);
  $.ajax({
      type:'get',
      url:'../../C/controlsortie.php?IdModSort='+idSortie,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frm_sortie').html('');
          $('#frm_sortie').html(serveur);
          $('#resultat').css('color','red').text("Modification !");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
// //Enregistrement modification
function Modifsortie(id,arme){
  // alert(id+'  '+arme);
  $.ajax({
      type:'POST',
      url:'../../C/controlsortie.php?IdEngMod='+id+'&arme='+arme,
      data: $('#formsortie').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          recherchesolde('');
          recherchesortie('');
          $('#frm_sortie').html('');
          $('#frm_sortie').html(serveur);
          $('#resultat').css('color','green').text("Modification reussi");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }else{
           $('#frm_sortie').html('');
          $('#frm_sortie').html(serveur);
          $('#resultat').show();
          $('#resultat').css('color','red').text("Echec merci de remplir les champs avec des valeurs Valides !");
          
        }
      } 
    });
}


//ici
function RecSrtie(id){
  // alert(id);
  $.ajax({
    type:'get',
    url:'../../C/controlsortie.php?RecSort='+id,
    success:function(server){
        // alert(server);
        $('#frm_sortie').html('');
        $('#frm_sortie').html(server);
         $('#formsortie').hide();
         $('#formsortie').fadeIn(1000);
        $('#formsortie').fadeIn('slow');
        $('#divenregsort').hide();
    }
  })
}

function supprimersortie(id){
	$.ajax({
		type:'get',
		url:'../../C/controlsortie.php?SortSup='+id,
    success:function(server){
      if(server==1){
        recherchesolde('');
        recherchesortie('');
        alert("Suppression réussie !");
      }else{
        alert("Suppression echoué !");
      }
    }
	})
}
function VeriStock(id,qte){
  // alert(id+'   '+qte);
  $.ajax({
    type:'get',
    url:'../../C/controlsortie.php?IdArme='+id+'&Qte='+qte,
    success:function(server){

      if(server==1){
       $('#qte_arm').css('border-color','green');
       $('#qte_arm').css('color','green');
      $('#divenregsort').fadeIn(2000);
        $('#divenregsort').fadeIn('slow');
       // alert(server);
      }else{
        $('#divenregsort').fadeOut(2000);
        $('#divenregsort').fadeOut('slow');
        $('#qte_arm').css('border-color','red');
        $('#qte_arm').css('color','red');
        alert("Solde Insuffisant !");
      }
    }
  })
}