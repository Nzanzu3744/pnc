<?php
//$Acces=$_SESSION['Agent']['IdFonct'];
function listeEntree(){
  //Global $Acces;
  ?>

<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>Entree</th>
                      <th>Designation</th>
                     
                      <th>NumDocJ_Entree</th>
                      <th>Qt_Entree</th>
                      <th>MAGAZINIER</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=entree::selectionnerentree();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $sel['Date_Entree'];?></td>
                        <td><?php echo $sel['Nom_Arme'].'_'.$sel['Model_arme'];?></td>
                        <td><?php echo $sel['Id_Com'];?></td>
                        

                        <td><?php echo $sel['Qt_Entree'];?></td>
                        <td><?php echo $sel['Fonct_Agent'].'  '.$sel['Nom_Agent'].' '.$sel['Postnom_Agent'].' '.$sel['Grade_Agent'];?></td>
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs no-print" onclick="RecModifEntre('<?=$sel['Id_Entree']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs no-print" onclick="supprimerentree('<?=$sel['Id_Entree']?>')">
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                          <?php
                        //}
                          ?>
                      </td>
                  </tr>
                        </td>
                    </tr>
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
                </table>

  <?php
}


function listeFiltreEntre($var){
  //Global $Acces;
  ?>

<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>Entree</th>
                      <th>Designation</th>
                     
                      <th>NumDocJ_Entree</th>
                      <th>Qt_Entree</th>
                      <th>MAGAZINIER</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=entree::rechercheentre($var);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $sel['Date_Entree'];?></td>
                        <td><?php echo $sel['Nom_Arme'].'_'.$sel['Model_arme'];?></td>
                        <td><?php echo $sel['Id_Com'];?></td>
                        

                        <td><?php echo $sel['Qt_Entree'];?></td>
                        <td><?php echo $sel['Fonct_Agent'].'  '.$sel['Nom_Agent'].' '.$sel['Postnom_Agent'].' '.$sel['Grade_Agent'];?></td>
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs no-print" onclick="RecModifEntre('<?=$sel['Id_Entree']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs no-print" onclick="supprimerentree('<?=$sel['Id_Entree']?>')">
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                          <?php
                        //}
                          ?>
                      </td>
                  </tr>
                        </td>
                    </tr>
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
                </table>

  <?php
}
function commandeFiltre($idCom){
   $tab=commande::Filtrecommande($idCom);
   while ($lit=$tab->fetch()) {
     $tabl=entree::req_entree_Comm($lit['Id_Com'])->fetch();
    $cpt=1;
    ?>
    <div style="width: 100%; height: 550px; border:5px solid black; margin-bottom: 10px;padding-left: 60PX;padding-right: 60PX;padding-top: 20PX;padding-bottom: 20PX; background: white" id="<?=$lit['Id_Com']?>">
     <p style="text-align: center"><mark class="no-print"><?php echo $cpt++;?></mark></p>
    <div style="width: 100%; height: 250px; border-bottom: 1px solid black;">
      <?php include('entete.php') ?>
    </div>

    <strong>COMMANDE N <?=' : '.$lit['Id_Com']?> ANNEE <?=' : '.$lit['Date_Com'] ?> </strong>
    <div style="width: 100%; height: 100px;">
      <table class="table table-bordered table-striped table-
condensed">
        <thead>
          <tr>
          <th>NOM</th>
          <th>MODEL</th>
          <th>DEMANDE</th>
          <th>RECU</th>
          <th>RESTE</th>
          <tr>
        </thead>
        <tbody>
          <tr>
            <td><?=$tabl['Nom_Arme']?></td>
            <td><?=$tabl['Model_arme']?></td>
            
            <td><?=$lit['Qt_Com']?></td>
            <td><?=$tabl['Entree']?></td>
            <td><?=$lit['Qt_Com']-$tabl['Entree']?></td>
          </tr>
        </tbody>
      </table>

    </div>
    <div style="width: 100%;" class="no-print">
       
        <?php
            if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

                ?>
        <button onclick="SuprimerCommande('<?=$lit['Id_Com']?>')" class="fas fa-trash btn-danger float-right no-print" style=" height: 30px"></button>
         <button onclick="ModifierCommande('<?=$lit['Id_Com']?>')" class="fas fa-edit btn-success float-right no-print" style=" height: 30px"></button> 
         <?php
       }
         ?>
         <button onclick="imprimer('<?=$lit['Id_Com']?>')" class="fas fa-print btn-default float-right no-print" style=" height: 30px"></button>
              <!-- /.card-body -->
    </div>
    
  </div>
  <?php
   }
 }
function commande(){
   $tab=commande::selectionnercommande();
   while ($lit=$tab->fetch()) {
     $tabl=entree::req_entree_Comm($lit['Id_Com'])->fetch();
    $cpt=1;
    ?>
    <div style="width: 100%; height: 550px; border:5px solid black; margin-bottom: 10px;padding-left: 60PX;padding-right: 60PX;padding-top: 20PX;padding-bottom: 20PX; background: white" id="<?=$lit['Id_Com']?>">
     <p style="text-align: center"><mark class="no-print"><?php echo $cpt++;?></mark></p>
    <div style="width: 100%; height: 250px; border-bottom: 1px solid black;">
     <?php include('entete.php') ?>

    </div>

    <strong>COMMANDE N <?=' : '.$lit['Id_Com']?> ANNEE <?=' : '.$lit['Date_Com'] ?> </strong>
    <div style="width: 100%; height: 100px;">
      <table class="table table-bordered table-striped table-
condensed">
        <thead>
          <tr>
          <th>NOM</th>
          <th>MODEL</th>
          <th>DEMANDE</th>
          <th>RECU</th>
          <th>RESTE</th>
          <tr>
        </thead>
        <tbody>
          <tr>
            <td><?=$tabl['Nom_Arme']?></td>
            <td><?=$tabl['Model_arme']?></td>
            
            <td><?=$lit['Qt_Com']?></td>
            <td><?=$tabl['Entree']?></td>
            <td><?=$lit['Qt_Com']-$tabl['Entree']?></td>
          </tr>
        </tbody>
      </table>

    </div>
    <div style="width: 100%;" class="no-print">
       
        <?php
            if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

                ?>
        <button onclick="SuprimerCommande('<?=$lit['Id_Com']?>')" class="fas fa-trash btn-danger float-right no-print" style=" height: 30px"></button>
         <button onclick="ModifierCommande('<?=$lit['Id_Com']?>')" class="fas fa-edit btn-success float-right no-print" style=" height: 30px"></button> 
         <?php
       }
         ?>
         <button onclick="imprimer('<?=$lit['Id_Com']?>')" class="fas fa-print btn-default float-right no-print" style=" height: 30px"></button>
              <!-- /.card-body -->
    </div>
    
  </div>
  <?php
   }
}
?>