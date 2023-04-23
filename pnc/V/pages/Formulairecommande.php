<?php

function fcommande($id){
  $EntreTab=entree::req_entree($id);
  $DonneeEntree=$EntreTab->fetch();
 
  ?>
   <form role="form" id="formcommande" style="text-align: center; font-size: 20px" >                
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="arme">ARME</label>
                      <button class="form-control" id="arme" name="arme" placeholder="nom_arm" value="<?=$DonneeEntree['Id_Arme']?>"><?=$DonneeEntree['Nom_Arme']?></button>
                  </div>
                  
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> QUANTITE</label>
                      <input type="text" class="form-control" id="qte_arm" name="qte_arm" placeholder="Quantité">
                  </div>

             <div class=" form-group  row" id="divenregsort" style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="ajoutercommande($('#arme').val())" value="Enregistrer">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler" onclick="commande('')">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}


function FrmFiltrecommande($idCom){
  $tab=commande::Filtrecommande($idCom);
  $Com=$tab->fetch();
  $EntreTab=entree::req_entree($Com['Id_Arme']);
  $DonneeEntree=$EntreTab->fetch();
 
  ?>
   <form role="form" id="formcommande" style="text-align: center; font-size: 20px" >                <button id="BtnIDCom" class="col-12 btn-xs" value="<?=$Com['Id_Com']?>" >Id : <?=$Com['Id_Com'].' - Date: '.$Com['Date_Com']?></button>
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="arme">ARME</label>
                      <button class="form-control" id="arme" name="arme" placeholder="nom_arm" value="<?=$DonneeEntree['Id_Arme']?>"><?=$DonneeEntree['Nom_Arme']?></button>
                  </div>
                  
                  <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Postnom_Agent"> QUANTITE</label>
                      <input type="text" class="form-control" id="qte_arm" name="qte_arm" value="<?=$Com['Qt_Com']?>">
                  </div>

             <div class=" form-group  row" id="divenregsort" style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" onclick="ConfirmModifiierCom($('#BtnIDCom').val(),$('#arme').val(),$('#qte_arm').val())" value="Modifier">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler" onclick="commande('')">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}
?>