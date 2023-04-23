<?php
//$Acces=$_SESSION['Agent']['IdFonct'];
function FiltreAgent($var){
  //Global $Acces;
  ?>
<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
    <?php
    $tab=agent::rechercheagent01($var);
    $cpt=1;
    while ($sel=$tab->fetch()) 
    {

      ?>
                           
        <p> <?php echo "Mat :".$sel['Matricul_Agent']. " <br>Noms : ". $sel['Nom_Agent']." ".$sel['Postnom_Agent']."  <br>Genre : ".$sel['Genre_Agent']."   <br>Grade :".$sel['Grade_Agent']."  <br>Fonction :".$sel['Fonct_Agent'];?> </p>                                                
  <?php
} 
}
//$Acces=$_SESSION['Agent']['IdFonct'];
function FiltreStock($var){
  //Global $Acces;
  $EntreTab=entree::req_entree($var);
  $SortieTab=sortie::req_sortie($var);
  $DonneeEntree=$EntreTab->fetch();
  $DonneeSortie=$SortieTab->fetch();
  $Solde=($DonneeEntree['Entree']-$DonneeSortie['Sortie']);
  if($Solde>=0){
   echo $Solde; 
 }                                          
}

function listeauto(){
  $tab=auto::selectionnerauto();
  $cpt=1;
  while ($liste=$tab->fetch()){
  ?>
  <div style="width: 100%; height: 1100px; border:5px solid black; margin-bottom: 10px;padding-left: 60PX;padding-right: 60PX;padding-top: 20PX;padding-bottom: 20PX; background: white" id="<?=$liste['Id_PortA']?>">
     <p style="text-align: center"><mark class="no-print"><?php echo $cpt++;?></mark></p>
    <?php include('entete.php') ?>

    <strong>AUTORISATION DE PORT D'ARME NUMERO<?=' : '.$liste['Id_PortA']?> ANNEE <?=' : '.$liste['Date_PortA'] ?> </strong>
    <div style="width: 100%; height: 68%;">
      <div >
        <p style="text-align: justify-all;"> Le Commissaire Provincial de la Police Nationale Congolaise de l Ituri par le bias du Chef de departement de la Logistique attribue au Policier: </p><br>
        <strong>
          MATRICUL : <?= ' '.strtoupper($liste['Matricul_Agent'])?><BR>
          NOM : <?= ' '.strtoupper($liste['Nom_Agent'])?><BR>
          POSTNOM: <?= ' '.strtoupper($liste['Postnom_Agent'])?><BR>
          GRADE : <?= ' '.strtoupper($liste['Grade_Agent'])?><BR>
          FONCTION : <?= ' '.strtoupper($liste['Fonct_Agent'])?><BR>
          SEXE : <?'  '.strtoupper($liste['Genre_Agent'])?><BR>
          UNITE : <?'  '.strtoupper($liste['Unite_PortA'])?><BR>
        </strong>
        <p style="text-align: justify-all;"> L arme dont les caracteristique ci-dessous : </p>
        <strong >
          GENRE : <?='  '.strtoupper($liste['Nom_Arme'])?><BR>
          TYPE OU MODEL : <?='  '.strtoupper($liste['Model_arme'])?><BR>
          NUMERO ARME : <?='  '.strtoupper($liste['Num_Arme_PortA'])?><BR>
          NOMBRE MINITION : <?='  '.strtoupper($liste['NbrMin_PortA'])?><BR>
          POUR USAGE : <?='  '.strtoupper($liste['Usage'])?><BR>
          DUREE : <?='<i>  De '.$liste['Date_PortA'].'Jusqu au'.$liste['Duree_PortA'].'</i>'?><BR>
        </strong>
        <blockquote>
        <strong> Consignes spéciales </strong>
        <p> (1)L utilisateur de l'arme ne peut intervenir qu'en cas de necessité</p>
        <p> (2)L utilisateur de l'arme ne peut intervenir qu'en cas de necessité</p>
        </blockquote>
        <div>
        <strong style="color:red">
          Vue et Approuvée par<br>


        <!-- ICI SESSION DE LAGENT  -->


        </strong>
        <strong class="float-right">
          Fait à Bunia, Le <?=' : '.$liste['Date_PortA'];?>
        </strong>
      </div>
      </div>

    </div>
    <div style="width: 100%;" class="no-print">
       
        <?php
            if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

                ?>
        <button onclick="SuprimerA('<?=$liste['Id_PortA']?>')" class="fas fa-trash btn-danger float-right " style=" height: 30px"></button>
         <button onclick="ModifierAuto('<?=$liste['Id_PortA']?>')" class="fas fa-edit btn-success float-right " style=" height: 30px"></button>
         <?php
            }
         ?>
         <button onclick="imprimer('<?=$liste['Id_PortA']?>')" class="fas fa-print btn-default float-right " style=" height: 30px"></button>
              <!-- /.card-body -->
    </div>
    
  </div>
  <?php
  }
}
//
function FiltrerAuto($var){
  $tab=auto::Filtrerauto($var);
  $cpt=1;
  while ($liste=$tab->fetch()){
  ?>

  <div style="width: 100%; height: 1100px; border:5px solid black; margin-bottom: 10px;padding-left: 60PX;padding-right: 60PX;padding-top: 20PX;padding-bottom: 20PX; background: white" id="<?=$liste['Id_PortA']?>">
    <p style="text-align: center"><mark class="no-print"><?php echo $cpt++;?></mark></p>
    <?php include('entete.php') ?>

    <strong>AUTORISATION DE PORT D'ARME NUMERO<?=' : '.$liste['Id_PortA']?> ANNEE <?=' : '.$liste['Date_PortA'] ?> </strong>
    <div style="width: 100%; height: 68%;">
      <div >
        <p style="text-align: justify-all;"> Le Commissaire Provincial de la Police Nationale Congolaise de l Ituri par le bias du Chef de departement de la Logistique attribue au Policier: </p><br>
        <strong>
          MATRICUL : <?= ' '.strtoupper($liste['Matricul_Agent'])?><BR>
          NOM : <?= ' '.strtoupper($liste['Nom_Agent'])?><BR>
          POSTNOM: <?= ' '.strtoupper($liste['Postnom_Agent'])?><BR>
          GRADE : <?= ' '.strtoupper($liste['Grade_Agent'])?><BR>
          FONCTION : <?= ' '.strtoupper($liste['Fonct_Agent'])?><BR>
          SEXE : <?'  '.strtoupper($liste['Genre_Agent'])?><BR>
          UNITE : <?'  '.strtoupper($liste['Unite_PortA'])?><BR>
        </strong>
        <p style="text-align: justify-all;"> L arme dont les caracteristique ci-dessous : </p>
       <strong >
          GENRE : <?='  '.strtoupper($liste['Nom_Arme'])?><BR>
          TYPE OU MODEL : <?='  '.strtoupper($liste['Model_arme'])?><BR>
          NUMERO ARME : <?='  '.strtoupper($liste['Num_Arme_PortA'])?><BR>
          NOMBRE MINITION : <?='  '.strtoupper($liste['NbrMin_PortA'])?><BR>
          POUR USAGE : <?='  '.strtoupper($liste['Usage'])?><BR>
          DUREE : <?='<i>  De '.$liste['Date_PortA'].'Jusqu au'.$liste['Duree_PortA'].'</i>'?><BR>
        </strong>
        <blockquote>
        <strong> Consignes spéciales </strong>
        <p> (1)L utilisateur de l'arme ne peut intervenir qu'en cas de necessité</p>
        <p> (2)L utilisateur de l'arme ne peut intervenir qu'en cas de necessité</p>
        </blockquote>
        <div>
        <strong style="color:red">
          Vue et Approuvée par<br>


        <!-- ICI SESSION DE LAGENT  -->


        </strong>
        <strong class="float-right">
          Fait à Bunia, Le <?=' : '.$liste['Date_PortA'];?>
        </strong>
      </div>
      </div>

    </div>
    <div style="width: 100%;" class="no-print">
       
        <?php
            if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

                ?>
        <button onclick="SuprimerA('<?=$liste['Id_PortA']?>')" class="fas fa-trash btn-danger float-right " style=" height: 30px"></button>
         <button onclick="ModifierAuto('<?=$liste['Id_PortA']?>')" class="fas fa-edit btn-success float-right " style=" height: 30px"></button>
         <?php
       }
       ?>
        <button onclick="imprimer('<?=$liste['Id_PortA']?>')" class="fas fa-print btn-default float-right " style=" height: 30px"></button>
              <!-- /.card-body -->
    </div>
    
  </div>
  <?php
  }
}
  ?>
  