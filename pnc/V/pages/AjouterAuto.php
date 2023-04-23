<script type="text/javascript" src="../plugins/scriptauto.js"></script>

<?php
//session_start();
// $Acces=$_SESSION['Agent']['IdFonct'];

// if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/agent.class.php');
include('../../M/auto.class.php');
include('../../M/arme.class.php');

include('../../M/entree.class.php');
include('../../M/sortie.class.php');

include('tableauauto.php');
include('Formulaireauto.php');

?>

<section class="row" style="height:700px;">
  <?php
  // if($Acces==2 || $Acces==5){
  ?>
	<div class='col-3' >
        <div class="card-header " style="background-color: #4d4d4e; color: white">
                <h3 class="card-title">OPERATION SUR AUTORISATION DE PORT D'ARME</h3>
        </div>
        <div id="frm_Aut">            
           <?php
              echo fauto(); 
                         
           ?>
         </div>
            <span id="resultat"></span>
	</div>
	<?php
//}
  ?>
	<div class="col-9">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">AUTORISATION DE PORT D"ARME</h3>

                <div class="card-tools row">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheauto($(this).val())">
                    
                  </div>
                  <button onclick="imprimer('div_Auto01')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                </div>

              </div>

              
              <div id="div_Auto01" class="card-body table-responsive p-0" style="height: 700px;">
                <?php
                
                  echo listeauto();
                  
                  
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
