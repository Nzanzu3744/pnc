<?php
function fentreefiltre($var){

  $tab=entree::recherche01($var);
  $Inf=$tab->fetch();
  ?>
  <form role="form" id="formentreeMdf" enctype="multipart/form-data" style="background: white;text-align: center" >
    <button id="BtnIDentre" class="col-12 btn-xs" value="<?=$Inf['Id_Entree']?>" >Id : <?=$Inf['Id_Entree'].' - Date: '.$Inf['Date_Entree']?></button>
        <div id="infoarme">

              </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="DocJust "> Numeron Document justificatif</label>
                      <input type="text" class="form-control input-xs" id="DocJust" name="DocJust"   value="<?=$Inf['Id_Com']?>" onkeyup="verifcmd($(this).val())">
                  </div>           
                  
                  <div class="form-group" style="text-align: center;">
                    <?php
                    include('../M/arme.class.php');
                    $tab=arme::selectionnerarme();
                    ?>
                      <label class="form-group " style="margin-bottom:0px;" >ARME</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="arme" id="arme" style="margin-top:0px;">
                          <option value="<?=$Inf['Id_Arme']?>"><?=$Inf['Nom_Arme'].'-'.$Inf['Model_arme']?></option>
                          <?php
                          while($liste=$tab->fetch()){
                             echo '<option value="'.$liste['Id_Arme'].'">'.$liste['Nom_Arme'].'_'.$liste['Model_arme'].'</option>';
                           }
                          ?>
                        </select>
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> Quantité</label>
                      <input type="text" class="form-control" id="qte_arm" name="qte_arm" value="<?=$Inf['Qt_Entree'];?>" >
                  </div>                  
             <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="Enregismodentree($('#BtnIDentre').val())" value="Modifier">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" onclick="annuler02()" value="Annuler">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}
function fentree(){
	?>

	 <form role="form" id="formentree" name="formentree" enctype="multipart/form-data" style="background: white;text-align: center" >
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="DocJust "> Numeron Document justificatif</label>
                      <input type="text" class="form-control input-xs" name="DocJust" id="DocJust" placeholder="Document justificatif" onkeyup="verifcmd($(this).val())">
                  </div>           
                  
                 
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> Quantité</label>
                      <input type="text" class="form-control" id="qte_arm" name="qte_arm" placeholder="Quantité" onkeyup="verifMotEntre($(this).val(),$('#DocJust').val())">
                  </div>	                
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;" id="enrecom">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btncl" name="btnagent" onclick="ajouterentree()" value="Enregistrer">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
             <span id="resultat"></span>
            </form>
	<?php
}
?>