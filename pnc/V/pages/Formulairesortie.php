<?php
function fsortiefiltre($var){

  $tab1=sortie::recherche01($var);
  $InfSort=$tab1->fetch();
  ?>
  

   <form role="form" id="formsortie" style="text-align: center; font-size: 20px" >                <button class="form-control" name="sortie" id="sortie" value="<?=$InfSort['Id_Sortie']?>"><?='<i style="color:red"> Numero: '.$InfSort['Id_Sortie'].' Date:'.$InfSort['Date_sortie'].'</i>'?></button>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="arme">ARME</label>
                      <button class="form-control" name="arme" id="arme" value="<?=$InfSort['Id_Arme']?>"><?=$InfSort['Nom_Arme']?></button>
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> BENEFICIERE</label>
                      <input type="text" class="form-control" name="benef" id="benef" placeholder="Beneficiere" value="<?=$InfSort['Benef']?>">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> QUANTITE</label>
                      <input type="text" class="form-control" name="qte_arm" id="qte_arm" onkeyup="VeriStock($('#arme').val(),$(this).val())" value="<?=$InfSort['Qt_Sortie']?>">
                  </div>

             <div class=" form-group  row" id="divenregsort" style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="Modifsortie($('#sortie').val(),$('#arme').val())" value="Modifier">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}




function fsortie($id){
  $EntreTab=entree::req_entree($id);
  $DonneeEntree=$EntreTab->fetch();
 
	?>
	 <form role="form" id="formsortie" style="text-align: center; font-size: 20px" >                
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="arme">ARME</label>
                      <button class="form-control" id="arme" name="arme" placeholder="nom_arm" value="<?=$DonneeEntree['Id_Arme']?>"><?=$DonneeEntree['Nom_Arme']?></button>
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> BENEFICIERE</label>
                      <input type="text" class="form-control"  name="benef" id="benef" placeholder="Beneficiere">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> QUANTITE</label>
                      <input type="text" class="form-control" name="qte_arm" id="qte_arm" placeholder="Quantité" onkeyup="VeriStock($('#arme').val(),$(this).val())">
                  </div>

  					 <div class=" form-group  row" id="divenregsort" style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="ajoutersortie($('#arme').val())" value="Enregistrer">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
             <span id="resultat"></span>
            </form>
	<?php
}
?>