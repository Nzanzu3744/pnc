<?php
//$Acces=$_SESSION['Agent']['IdFonct'];
function listeAgent(){
  //Global $Acces;
  ?>

<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>

                      <th>N</th>
                      <th>Numero Matricul</th>
                     
                      <th>Nom</th>
                      <th>PostNom</th>
                      <th>Mail</th>
                      <th>Genre</th>
                      <th>Grade</th>
                      <th>Fonction</th>
                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=agent::selectionneragent();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td id="Id_Agent"> <?php echo $sel['Matricul_Agent'];?></td>
                        <td id=""><?php echo $sel['Nom_Agent'];?></td>
                        <td><?php echo $sel['Postnom_Agent'];?></td>
                        <td><?php echo $sel['Email_Agent'];?></td>
                        <td><?php echo $sel['Genre_Agent'];?></td>
                        <td><?php echo $sel['Grade_Agent'];?></td>
                        <td><?php echo $sel['Fonct_Agent'];?></td>
                       </td>                       
                       
                        
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs" onclick="RecModifAgent('<?=$sel['Matricul_Agent']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs" onclick="supprimeragent('<?=$sel['Matricul_Agent']?>')">
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


//$Acces=$_SESSION['Agent']['IdFonct'];
function listeFiltreAgent($var){
  //Global $Acces;
  ?>

<table class="table table-head-fixed text-nowrap" style="background:white; color: black">
                  <thead>
                    <?php include('entete.php') ?>
                    <tr>
                      <th>N</th>
                      <th>Numero Matricul</th>
                     
                      <th>Nom</th>
                      <th>PostNom</th>
                      <th>Email</th>
                      <th>Genre</th>
                      <th>Grade</th>
                      <th>Fonction</th>
                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=agent::rechercheagent($var);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr> 
                        <td> <?php echo $cpt;?></td>
                        <td id="Id_Agent"> <?php echo $sel['Matricul_Agent'];?></td>
                        <td id=""><?php echo $sel['Nom_Agent'];?></td>
                        <td><?php echo $sel['Postnom_Agent'];?></td>
                        <td><?php echo $sel['Email_Agent'];?></td>
                        <td><?php echo $sel['Genre_Agent'];?></td>
                        <td><?php echo $sel['Grade_Agent'];?></td>
                        <td><?php echo $sel['Fonct_Agent'];?></td>
                       </td>                       
                       
                        
                        <td style="color: black">
                         
                    <?php
                  

                          //if($Acces==1 || $Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs" onclick="RecModifAgent('<?=$sel['Matricul_Agent']?>')">
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        // }
                        //   if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs" onclick="supprimeragent('<?=$sel['Matricul_Agent']?>')">
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
  ?>