<script type="text/javascript" src="../plugins/scriptsortie.js"></script>
<?php
//session_start();
// $Acces=$_SESSION['Agent']['IdFonct'];

// if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/sortie.class.php');
include('../../M/entree.class.php');
include('../../M/arme.class.php');
include('tableausortie.php');
include('Formulairesortie.php');

?>

<section style="height:1200px;">
  <?php
  // if($Acces==2 || $Acces==5){
  ?>
  <div style="text-align: center; height: 500px">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">DISPONIBLES EN STOCK</h3>
                 <button onclick="imprimer('div_Solde')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
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

  <div class="row col-12" style="">
	<div class='col-3' >
        <div class="card-header " style="background-color: #4d4d4e; color: white">
                <h3 class="card-title">OPERATION SUR SORTIE STOCK</h3>
        </div>
        <div id="frm_sortie">            
                  
         </div>
            <span id="resultat"></span>
	</div>
	<?php
//}
  ?>
	<div class="col-9">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">SORTIE STOCK</h3>
                 <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche" onkeyup="recherchesortie($(this).val())">
                    
                  </div>
                </div>

              </div>

              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 660px;">
                <?php
                
                  echo listeSortie();
                  
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