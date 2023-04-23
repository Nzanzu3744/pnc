<?php
include('../M/agent.class.php');
include('../M/entree.class.php');
include('../M/sortie.class.php');
include('../M/auto.class.php');
include('../v/pages/tableauauto.php');
include('../v/pages/Formulaireauto.php');

if(isset($_POST['arme']) AND !empty($_POST['arme']) AND isset($_POST['agent']) AND !empty($_POST['agent']) AND !isset($_GET['idAutoriEnrg']) ){

		
	$Unite_PortA=htmlspecialchars($_POST['unite']);	
	$Num_Arme_PortA=htmlspecialchars($_POST['num_arm']);	
	$Matricul_Agent=htmlspecialchars($_POST['agent']);
	$Id_Usage=htmlspecialchars($_POST['usage']);
	$Id_Arme=htmlspecialchars($_POST['arme']);
	$dure=htmlspecialchars($_POST['Duree']);
	$NbMin=htmlspecialchars($_POST['NbMin']);
	
	auto::ajouterauto($Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin);
}
//Modification
if(isset($_GET['RecIdModAut']) AND !empty($_GET['RecIdModAut'])){
	$RecIdModAut=htmlspecialchars($_GET['RecIdModAut']); 
	include('../M/arme.class.php');
	include('../M/usage.class.php');
	echo fautofiltre($RecIdModAut); 
}

if(isset($_GET['RecIdModAut']) AND empty($_GET['RecIdModAut'])){
	include('../M/arme.class.php');
	include('../M/usage.class.php');
	echo fauto();
}
//idAutoriEnrg
//Modifier
if(isset($_POST['arme']) AND !empty($_POST['arme']) AND isset($_POST['agent']) AND !empty($_POST['agent']) AND isset($_GET['idAutoriEnrg']) ){

	$id=$_GET['idAutoriEnrg'];
	$Unite_PortA=htmlspecialchars($_POST['unite']);	
	$Num_Arme_PortA=htmlspecialchars($_POST['num_arm']);	
	$Matricul_Agent=htmlspecialchars($_POST['agent']);
	$Id_Usage=htmlspecialchars($_POST['usage']);
	$Id_Arme=htmlspecialchars($_POST['arme']);
	$dure=htmlspecialchars($_POST['Duree']);
	$NbMin=htmlspecialchars($_POST['NbMin']);
	
	auto::modificationAuto($id,$Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin);
}

//Supprimer
 if(isset($_GET['numeagentsup']) AND !empty($_GET['numeagentsup']))
{
	$numeagentsup=htmlspecialchars($_GET['numeagentsup']);
	 echo agent::supprimeragent($numeagentsup);
	
}
//Recherche
 if(isset($_GET['RechAgent']) AND !empty($_GET['RechAgent']))
{
	$RechAgent=htmlspecialchars($_GET['RechAgent']);
        echo FiltreAgent($RechAgent);	
}
 if(isset($_GET['verifAgent']) AND !empty($_GET['verifAgent']))
{
	$verifAgent=htmlspecialchars($_GET['verifAgent']);
	$tab=agent::rechercheagent01($verifAgent)->fetch();
        if(is_null($tab['Matricul_Agent'])){
        	echo 0;
        }
        if(!is_null($tab['Matricul_Agent'])){
        	echo 1;
        }	
}
 if(isset($_GET['verifstock']) AND !empty($_GET['verifstock']))
{
	$verifstock=htmlspecialchars($_GET['verifstock']);
        echo FiltreStock($verifstock);	
}
if(isset($_GET['rechAut']) AND !empty($_GET['rechAut']))
{
	$rechAut=htmlspecialchars($_GET['rechAut']);
        echo FiltrerAuto($rechAut);	
}
if(isset($_GET['rechAut']) AND empty($_GET['rechAut']))
{
        echo listeauto();
}

if(isset($_GET['supAuto']) AND !empty($_GET['supAuto']))
{

        echo auto::SupprimerAuto($_GET['supAuto']);
}
//AnnalerMod
if (isset($_GET['annuler']) AND !empty($_GET['annuler'])) {
 	echo fagent(); 
 }