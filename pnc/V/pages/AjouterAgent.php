<script type="text/javascript" src="../plugins/scriptagent.js"></script>
<?php

include('header.php');
include('../../M/agent.class.php');
include('tableauagent.php');
include('Formulaireagent.php');

?>

<section class="row" style="height:700PX;">
	<div class='col-3' >
        <div class="card-header " style="background-color: #4d4d4e; color: white">
                <h3 class="card-title">OPERATION SUR AGENT</h3>
        </div>
        <div id="frm_Agent">            
           <?php
              echo fagent();             
           ?>
         </div>
            <span id="resultat"></span>
	</div>
	<div class="col-9">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DE AGENTS</h3>

                <div class="card-tools row">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheagent($(this).val())">
                    
                  </div>
                   <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
                </div>

              </div>

              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 700px;">
                <?php
                
                  echo listeAgent();
                  
                ?>
              </div>
             
              <!-- /.card-body -->
        </div>


</section>

<!--  -->

<?php
include('footer.php');  

?>