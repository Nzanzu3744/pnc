<script type="text/javascript" src="../plugins/scriptentree.js"></script>

<?php
//session_start();
// $Acces=$_SESSION['Agent']['IdFonct'];

// if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/entree.class.php');
include('../../M/arme.class.php');
include('../../M/commande.class.php');
include('tableauentree.php');
include('Formulaireentree.php');

?>

<section class="row" style="height:800px;">
<div class="col-7" style="height:560px;">
	<div class="">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">ENTREE STOCK</h3>

                <div class="card-tools row">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheentre($(this).val())">
                    
                  </div>
                   <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                </div>

              </div>

              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 440px;">
                <?php
                
                  echo listeEntree();
                  
                ?>
              </div>
             
              <!-- /.card-body -->
        </div>

  <div class='' >
        <div class="card-header " style="background-color: #4d4d4e; color: white">
                <h3 class="card-title">OPERATION SUR ENTREE STOCK</h3>
        </div>
        <div id="frm_entree">            
                    
             <?php
                echo fentree();             
             ?>
          
         </div>
            <span id="resultat"></span>
  </div>
  <?php
//}
  ?>
    </div>
    <div class="col-5" style="height: 700px;">
        <div class='' >
        <div class="card-header " style="background-color: #4d4d4e; color: white;text-align: center">
                <h3 class="card-title">COMMANDES</h3>
        </div>
        <div id="commande" class="card-body table-responsive " style="padding:30px; height: 700px">            
                    
             <?php
                echo commande();             
             ?>
          
         </div>
            
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