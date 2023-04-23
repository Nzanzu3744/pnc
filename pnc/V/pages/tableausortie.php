<?php
//$Acces=$_SESSION['Agent']['IdFonct'];
function listeSortie(){
  //Global $Acces;
  ?>
<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Designation</th>
                     
                     
                      <th>Qt_Sortie</th>
                      <th>BENEFICIERE</th>                     
                      <th>MAGAZINIER</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=sortie::selectionnersortie();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $sel['Id_Sortie'];?></td>
                        <td><?php echo $sel['Date_sortie'];?></td>
                        <td><?php echo $sel['Nom_Arme'].'_'.$sel['Model_arme'];?></td>
                        
                        

                        <td><?php echo $sel['Qt_Sortie'];?></td>
                        <td><?php echo strtoupper($sel['Benef']);?></td>
                        <td><?php echo $sel['Fonct_Agent'].'  '.$sel['Nom_Agent'].' '.$sel['Postnom_Agent'].' '.$sel['Grade_Agent'];?></td>
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs"  onclick="RecModifSortie('<?=$sel['Id_Sortie']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs" onclick="supprimersortie('<?=$sel['Id_Sortie']?>')">
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

function listeFiltreSortie($id){
  //Global $Acces;
  ?>
<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Designation</th>
                     
                     
                      <th>Qt_Sortie</th>
                      <th>BENEFICIERE</th>                     
                      <th>MAGAZINIER</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=sortie::recherchesortie($id);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $sel['Id_Sortie'];?></td>
                        <td><?php echo $sel['Date_sortie'];?></td>
                        <td><?php echo $sel['Nom_Arme'].'_'.$sel['Model_arme'];?></td>
                        
                        

                        <td><?php echo $sel['Qt_Sortie'];?></td>
                        <td><?php echo strtoupper($sel['Benef']);?></td>
                        <td><?php echo $sel['Fonct_Agent'].'  '.$sel['Nom_Agent'].' '.$sel['Postnom_Agent'].' '.$sel['Grade_Agent'];?></td>
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs" onclick="RecModifSortie('<?=$sel['Id_Sortie']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs" onclick="supprimersortie('<?=$sel['Id_Sortie']?>')">
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

function Solde(){

  ?>
<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>DESIGNATION</th>
                      <th>QUANTITE ENTRE</th>
                      <th>QUANTITE SORTIE</th>
                      <th>SOLDE</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ArmeTab=arme::selectionnerarme();
                    $cpt=1;
                    while ($selArm=$ArmeTab->fetch()) 
                    {
                      $EntreTab=entree::req_entree($selArm['Id_Arme']);
                      $SortieTab=sortie::req_sortie($selArm['Id_Arme']);
                      $DonneeEntree=$EntreTab->fetch();
                      $DonneeSortie=$SortieTab->fetch();
                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $DonneeEntree['Id_Arme'];?></td>
                        <td><?php echo $DonneeEntree['Nom_Arme'].' '.$DonneeEntree['Model_arme'];?></td>
                        <td><?php echo $DonneeEntree['Entree'];?></td>
                        <td><?php echo $DonneeSortie['Sortie'];?></td>
                    <?php
                    $Solde=($DonneeEntree['Entree']-$DonneeSortie['Sortie']);
                    if($Solde<=0){
                        echo '<td style="color:red; font-size:20px; background:black">'.$Solde.'</td>';
    
                      }else{

                        echo '<td style="color:white;font-size:20px; background:green">'.$Solde.'</td>';
                        
                            
                              if($_SESSION['Agent']['Fonct_Agent']=='Logisticier'){
                        echo '<td><a class="btn btn-info btn-xs" onclick="RecSrtie('.$DonneeEntree['Id_Arme'].')" >
                              <i class="fas fa-edit">
                              </i>
                              Sortir
                          </a></td>';
                        }
                     }
                     if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
                      echo '<td><a class="btn btn-info btn-xs" onclick="commande('.$DonneeEntree['Id_Arme'].')" >
                              <i class="fas fa-edit">
                              </i>
                              Commander
                          </a></td>';
                        }
                      ?>
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          
                  </tr>
    
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
                </table>
<?php
}

function FiltreSolde($var){

  ?>
<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>DESIGNATION</th>
                      <th>QUANTITE ENTRE</th>
                      <th>QUANTITE SORTIE</th>
                      <th>SOLDE</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php                    
                    $ArmeTab=arme::filtrerarme($var);
                    $cpt=1;
                    while ($selArm=$ArmeTab->fetch()) 
                    {
                      $EntreTab=entree::req_entree($selArm['Id_Arme']);
                      $SortieTab=sortie::req_sortie($selArm['Id_Arme']);
                      $DonneeEntree=$EntreTab->fetch();
                      $DonneeSortie=$SortieTab->fetch();
                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td><?php echo $DonneeEntree['Id_Arme'];?></td>
                        <td><?php echo $DonneeEntree['Nom_Arme'].' '.$DonneeEntree['Model_arme'];?></td>
                        <td><?php echo $DonneeEntree['Entree'];?></td>
                        <td><?php echo $DonneeSortie['Sortie'];?></td>
                    <?php
                    $Solde=($DonneeEntree['Entree']-$DonneeSortie['Sortie']);
                    if($Solde<=0){
                        echo '<td style="color:red; font-size:20px; background:black">'.$Solde.'</td>';
    
                      }else{
                        echo '<td style="color:white;font-size:20px; background:green">'.$Solde.'</td>';
                        if($_SESSION['Agent']['Fonct_Agent']=='Logisticier'){    
                        echo '<td><a class="btn btn-info btn-xs" onclick="RecSrtie('.$DonneeEntree['Id_Arme'].')" >
                              <i class="fas fa-edit">
                              </i>
                              Sortir
                          </a></td>';
                        }
                     }
                     if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
                     echo '<td><a class="btn btn-info btn-xs" onclick="commande('.$DonneeEntree['Id_Arme'].')" >
                              <i class="fas fa-edit">
                              </i>
                              Commander
                          </a></td>';
                        }
                      ?>
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          
                  </tr>
    
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
                </table>
<?php
}
?>