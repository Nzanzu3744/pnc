<script type="text/javascript" src="../plugins/scriptsortie.js"></script>
<script type="text/javascript" src="../plugins/scriptentree.js"></script>
<script type="text/javascript" src="../plugins/scriptcommande.js"></script>


<?php
//session_start();
// $Acces=$_SESSION['Agent']['IdFonct'];

// if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/agent.class.php');
include('../../M/entree.class.php');
include('../../M/sortie.class.php');
include('../../M/commande.class.php');
include('../../M/arme.class.php');
include('tableauentree.php');
include('tableausortie.php');
include('tableaucommande.php');

include('Formulairecommande.php');

?>

<section style="height:1100px;">
  <?php
  // if($Acces==2 || $Acces==5){
  ?>
  <div class="" style="height: 500px" id="stock">
    <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">DISPONIBLES EN STOCK</h3>
                 <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche" onkeyup="recherchesolde($(this).val())">
                    
                  </div>
                </div>

              </div>
              

    <div id="div_Solde" class="card-body table-responsive p-0" style="height: 430px;">
    <?php
      echo Solde();
    ?>
  </div>
  </div>
  <div class="row" style="height: 550px"> 
    	<div class='col-3' >
            <div class="card-header " style="background-color: #4d4d4e; color: white">
                    <h3 class="card-title">ELABORATION COMMANDE</h3>
            </div>
            <div id="formCommande">            
              <div style="margin-top:150px;color:green;text-align:center"><i>MERCI DE SELECTIONNER LE MATERIEL DANS LE TABLEAU CI HAUT</i></div>
             </div>
                <span id="resultat"></span>
    	</div>
    	<?php
    //}
      ?>
    	<div class="col-9">
                  <div class="card-header" style="background-color: #4d4d4e">
                    <h3 class="card-title" style="color: white">LISTE DES COMMANDES</h3>

                    <div class="card-tools row">
                      <div class="input-group input-group-sm " style="width: 250px;">
                        <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche"onkeyup="verifcmd($(this).val())">

                        
                      </div>
                      <button onclick="imprimer('commande')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                    </div>

                  </div>

                  
                  <div id="commande" class="card-body table-responsive p-0" style="height: 550px;">
                    <?php
                    
                       echo commande(); 
                      
                      
                    ?>
                  </div>
                
                  <!-- /.card-body -->
            </div>
      </div>


</section>

<!--  -->

<?php
include('footer.php');  
// }
// if(!isset($_SESSION['Agent'])){
//   header('location:login.php');
// }
?>
