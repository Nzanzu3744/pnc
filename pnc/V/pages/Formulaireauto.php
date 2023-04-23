<?php

function fauto(){
	?>

	 <form role="form" id="formauto" name="formauto" enctype="multipart/form-data" style="text-align: center; background: white">
        <!-- ICI INFO SGENT -->
        

        <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
            <label for="agent">AGENT</label>
            <div id="infoagent" style="margin: -10px">

        </div>
          <input type="text" class="form-control" name="agent" id="agent" onkeyup="AgentInfo($(this).val())">
      </div>
      <div>
          <label for="unite"> UNITE DE L'AGENT </label>
        <input name="unite" id="unite" type="text" class="form-control input-xs">
      </div>
      <!-- ICI INFO SGENT -->
          

      <div class="form-group" style="text-align: center;">
            <?php
        $tab=arme::selectionnerarme();
        ?>
          <label class="form-group " for="arme" style="margin-bottom:0px;" >ARME</label>
          <div id="infoarme">

          </div>
            <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="arme" id="arme" style="margin-top:0px;" onchange="verifstock($(this).val())">
              <option value="" >Aucun</option>
              <?php
              while($liste=$tab->fetch()){
                 echo '<option value="'.$liste['Id_Arme'].'">'.$liste['Nom_Arme'].'_'.$liste['Model_arme'].'</option>';
               }
              ?>
            </select>
      </div>
      <div class="row">
          <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
              <label for="num_arme"> NUMERO ARME</label>
              <input type="text" class="form-control" name="num_arm" id="num_arm">
          </div>
          <div class="form-group col-6 " style="padding-bottom: 0px; margin-bottom: 0px;">
              <label for="num_arme"> NB. MIN</label>
              <input type="text" class="form-control" name="NbMin" id="NbMin">
          </div>
        </div>
       <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
          <label for="usage"> USAGE</label>
          <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="usage" id="usage" style="margin-top:0px;">
              <option value="" >Aucun</option>
              <?php
              include('../../M/usage.class.php');
              $tabUsage=usage::selectionnerusage();
              while($lt=$tabUsage->fetch()){
                 echo '<option value="'.$lt['Id_Usage'].'">'.$lt['Usage'].'</option>';
               }
              ?>
            </select>
      </div>
       <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
          <label for="num_arme">DUREE</label>
          <input type="date" class="form-control" name="Duree" id="Duree">
      </div>
      
                  
                 
                  



             
	                
  					 <div class=" form-group  row" id="divEnregAuto"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btncl" name="btnagent" onclick="ajouterauto()" value="Enregistrer">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
             <span id="resultat"></span>
            </form>
	<?php
}


// 








function fautofiltre($id){
 $tab=auto::FiltrerautobyId($id);
  $lis=$tab->fetch();

  ?>

   <form role="form" id="formauto" name="formauto" enctype="multipart/form-data" style="text-align: center; background: white">
        <!-- ICI INFO SGENT -->
        
        <button id="IdMod" class="col-12 btn-xs" value="<?=$lis['Id_PortA']?>" >Autorisation Numéro : <?=$lis['Id_PortA']?></button>
        <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
            <label for="agent">AGENT</label>
            <div id="infoagent" style="margin: -10px">
              <?php
                echo FiltreAgent($lis['Matricul_Agent']);
              ?>

        </div>
          <input type="text" class="form-control" name="agent" id="agent" onkeyup="AgentInfo($(this).val())" value="<?=$lis['Matricul_Agent']?>">
      </div>
      <div>
          <label for="unite"> UNITE DE L'AGENT </label>
        <input name="unite" id="unite" type="text" class="form-control input-xs" value="<?=$lis['Unite_PortA']?>">
      </div>
      <!-- ICI INFO SGENT -->
          

      <div class="form-group" style="text-align: center;">
          <label class="form-group " for="arme" style="margin-bottom:0px;" >ARME</label>
          <div id="infoarme">
              <?php
                echo ' Quanité Total.'.FiltreStock($lis['Id_Arme']);
              ?>
          </div>
            <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="arme" id="arme" style="margin-top:0px;" onchange="verifstock($(this).val())">
               <?php
                $tab=arme::filtrerarmebyId($lis['Id_Arme']);
                 echo '<option value="'.$lis['Id_Arme'].'">'.$lis['Nom_Arme'].'_'.$lis['Model_arme'].'</option>';
                ?>
              <option value="" >Aucun</option>
              <?php
               $tab=arme::selectionnerarme();
              while($liste=$tab->fetch()){
                 echo '<option value="'.$liste['Id_Arme'].'">'.$liste['Nom_Arme'].'_'.$liste['Model_arme'].'</option>';
               }
              ?>
            </select>
      </div>
      <div class="row">
          <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
              <label for="num_arme"> NUMERO ARME</label>
              <input type="text" class="form-control" name="num_arm" id="num_arm" value="<?=$lis['Num_Arme_PortA']?>">
          </div>
          <div class="form-group col-6 " style="padding-bottom: 0px; margin-bottom: 0px;">
              <label for="num_arme"> NB. MIN</label>
              <input type="text" class="form-control" name="NbMin" id="NbMin" value="<?=$lis['NbrMin_PortA']?>">
          </div>
        </div>
       <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
          <label for="usage"> USAGE</label>
          <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="usage" id="usage" style="margin-top:0px;">
            <?php
              $tabUsageId=usage::selectionnerusagebyId($lis['Id_Usage']);
              $ltUsage=$tabUsageId->fetch();
              echo '<option value="'.$ltUsage['Id_Usage'].'">'.$ltUsage['Usage'].'</option>';
            ?>
              <option value="" >Aucun</option>
              <?php
              
              $tabUsage=usage::selectionnerusage();
              while($lt=$tabUsage->fetch()){
                 echo '<option value="'.$lt['Id_Usage'].'">'.$lt['Usage'].'</option>';
               }
              ?>
            </select>
      </div>
       <div class="form-group " style="padding-bottom: 0px; margin-bottom: 0px;">
          <label for="num_arme">DUREE</label>
          <input type="date" class="form-control" name="Duree" id="Duree" value="<?=$lis['Duree_PortA']?>">
      </div>
      
                  
                 
                  



             
                  
             <div class=" form-group  row" id="divEnregAuto"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 10px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btncl" name="btnagent" onclick="ModifierAuto($('#IdMod').val())" value="Modifier">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler" onclick="RecAuto('')">       
            </div>
             <span id="resultat"></span>
            </form>
  <?php
}
?>

