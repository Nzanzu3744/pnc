<?php
function fagentfiltre($var){
  $tabcl=agent::rechercheagent($var);
  $InfCli=$tabcl->fetch();
  ?>

   <form role="form" id="formagentMof" enctype="multipart/form-data" style="background: white">
          <button id="IdMod" class="col-12 btn-xs" value="<?=$InfCli['Matricul_Agent']?>" >ID: <?=$InfCli['Matricul_Agent']?></button>

                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Nom_Agent"> Nom</label>
          <input  type="text" class="form-control input-xs"  value="<?=$InfCli['Nom_Agent']?>" id="Nom_Agent" name="Nom_Agent">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> Postnom</label>
                      <input type="text" class="form-control" value="<?=$InfCli['Postnom_Agent']?>" id="Postnom_Agent" name="Postnom_Agent">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Email_Agent"> Mail</label>
                      <input type="text" class="form-control"  value="<?=$InfCli['Email_Agent']?>" id="Email_Agent" name="Email_Agent">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Cle_Agent"> Mot depasse</label>
                      <input type="text" class="form-control"  value="<?=$InfCli['Cle_Agent']?>" id="Cle_Agent" name="Cle_Agent">
                  </div>
    
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="Photo_Agent">Photo </label>
                    <input type="file" class="form-control" id="Photo_Agent" name="Photo_Agent">
                  </div>
                  
                  
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >GRADE</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" id="Grade_Agent" name="Grade_Agent" style="margin-top:0px;">
                          <option value="<?=$InfCli['Grade_Agent']?>"><?=$InfCli['Grade_Agent'];?></option>
                          <option value="Aucun">Aucun</option>
                          <option value="General">General</option>
                          <option value="Major">Major</option>
                          <option value="Colonnel">Colonnel</option>
                          <option value="Capitain">Capitain</option>
                          <option value="Caporal">Caporal</option>
                          <option value="Lietenant">Lietenant</option>
                          <option value="Sous_Lietenant">Sous_Lietenant</option>
  
                        </select>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >FONCTION</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" id="Fonct_Agent" name="Fonct_Agent" style="margin-top:0px;">
                          
                          <option value="<?=$InfCli['Fonct_Agent']?>"><?=$InfCli['Fonct_Agent'];?></option>
                         
                          <option value="Aucun">Aucun</option>
                          <?php
                               if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
                             ?>
                          
                          <option value="Com_Prov">Commissaire Provincial.</option>
                          <option value="Com_Urbain">Commessaire Ubain</option>
                          <option value="Logisticier">Logisticier</option>
                          <option value="Sous_Com">Sous Commissaire</option>
                          <?php
                        }
                          ?>
                          <option value="Porteur">Porteur</option>
                        </select>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >Genre</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" id="Genre_Agent" name="Genre_Agent" style="margin-top:0px;">
                          <option value="<?=$InfCli['Genre_Agent']?>"><?=$InfCli['Genre_Agent'];?></option>
                          <option value="Aucun">Aucun</option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                  </div>



             
                  
             <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="modAgent($('#IdMod').val())" value="Modifier">
                     
                      <input type="button" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" onclick="annuler01()" value="Annuler">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}
function fagent(){
	?>

	 <form role="form" id="formagent" enctype="multipart/form-data" style="background: white">
           
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Nom_Agent "> Nom</label>
                      <input type="text" class="form-control input-xs" id="Nom_Agent" name="Nom_Agent" placeholder="Nom">
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> Postnom</label>
                      <input type="text" class="form-control" id="Postnom_Agent" name="Postnom_Agent" placeholder="Postnom">
                  </div>
                   <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Email_Agent"> Mail</label>
                      <input type="text" class="form-control" id="Email_Agent" name="Email_Agent" placeholder="Mail" >
                  </div>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Cle_Agent"> Mot depasse</label>
                      <input type="text" class="form-control" id="Cle_Agent" name="Cle_Agent" placeholder="Mot depasse">
                  </div>
          
                  <!--`Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`  -->
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="Photo_Agent">Photo </label>
                    <input type="file" class="form-control" id="Photo_Agent" name="Photo_Agent" placeholder="">
                  </div>
                  
                  
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >GRADE</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="Grade_Agent" id="Grade_Agent" style="margin-top:0px;">
                          <option value="Aucun">Aucun</option>

                          <option value="General">General</option>
                          <option value="Major">Major</option>
                          <option value="Colonnel">Colonnel</option>
                          <option value="Capitain">Capitain</option>
                          <option value="Caporal">Caporal</option>
                          <option value="Lietenant">Lietenant</option>
                          <option value="Sous_Lietenant">Sous_Lietenant</option>
                          
                        </select>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >FONCTION</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="Fonct_Agent" id="Fonct_Agent" style="margin-top:0px;">
                          <option value="Aucun">Aucun</option>
                            <?php
                               if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
                             ?>
                          <option value="Com_Prov">Commissaire Provincial.</option>
                          <option value="Com_Urbain">Commessaire Ubain</option>
                          <option value="Logisticier">Logisticier</option>
                          <option value="Sous_Com">Sous Commissaire</option>
                          <?php
                        }

                        ?>
                          <option value="Porteur">Porteur</option>
                        </select>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >Genre</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="Genre_Agent" id="Genre_Agent" style="margin-top:0px;">
                          <option value="Aucun">Aucun</option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                  </div>



             
	                
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btncl" name="btnagent" onclick="ajouteragent()" value="Enregistrer">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
             <span id="resultat"></span>
            </form>
	<?php
}
?>