<?php
include('header.php');	
?>
<div style="margin-top: 5%; margin-left: 5%; color: black; text-align: center; font-size: 60px; height:700px">
	<?php include('entete.php') ?>
	
	 <div style="">
		<?php
		if($_SESSION['Agent']['Fonct_Agent']=='Com_Prov'){
			echo "Bienvenu(e) au Bureau du Commissariat Provincial !"; 
		}if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
			echo "Bienvenu(e) au Bureau du Commissariat Urbain ! "; 
		}if($_SESSION['Agent']['Fonct_Agent']=='Logisticier'){
			echo "Bienvenu(e) a la Logistique Urbainne !"; 
		}if($_SESSION['Agent']['Fonct_Agent']=='Sous_Com'){
			echo "Bienvenu(e) au Sous Commissariat !"; 
		}
		?>
		 <H1 style="color:green" > <?php echo strtoupper( $_SESSION['Agent']['Nom_Agent'].' '.$_SESSION['Agent']['Postnom_Agent']);?>
	 </H1>
	</div>
</div>
<?php
include('footer.php');	
?>