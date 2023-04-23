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

<section style="height:750px;">
  <?php
  // if($Acces==2 || $Acces==5){
  ?>
    	<div class="col-12 p-10">
                  <div class="card-header" style="background-color: #4d4d4e">
                    <h3 class="card-title" style="color: white">LISTE DES COMMANDES</h3>

                    <div class="card-tools row">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche"onkeyup="verifcmd($(this).val())">
                        
                      </div>
                        <button onclick="imprimer('commande')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                    </div>

                  </div>

                  
                  <div id="commande" class="card-body table-responsive p-0" style="height: 700px;">
                    <?php
                    
                       echo commande(); 
                      
                      
                    ?>
                  </div>
                  
                  <!-- /.card-body -->
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
