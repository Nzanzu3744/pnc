<?php
include('../M/agent.class.php');
include('../v/pages/tableauagent.php');
include('../v/pages/Formulaireagent.php');
include('Upload.class.php');

if(isset($_POST['Nom_Agent']) AND !empty($_POST['Nom_Agent']) AND isset($_POST['Postnom_Agent']) AND !empty($_POST['Postnom_Agent']) AND !isset($_GET['Postnom_Agent']) AND isset($_POST['Email_Agent']) AND !empty($_POST['Email_Agent']) AND isset($_POST['Fonct_Agent']) AND !empty($_POST['Fonct_Agent']) AND !isset($_GET['idagentMod']) ){
	 $Nom_Agent=htmlspecialchars($_POST['Nom_Agent']); 
	 $Postnom_Agent=htmlspecialchars($_POST['Postnom_Agent']); 
	 $Email_Agent=htmlspecialchars($_POST['Email_Agent']); 
	 $Cle_Agent=htmlspecialchars($_POST['Cle_Agent']); 
	 $Grade_Agent=htmlspecialchars($_POST['Grade_Agent']);

	// $Photo_Agent= new Upload_file('Photo_Agent');
	// $Photo_Agent->envoi_photo('Photo');
	// $UrlPhoto=$Photo_Agent->getNom_du_fichier();
	$UrlPhoto="Url de la photo";

	 $Fonct_Agent=htmlspecialchars($_POST['Fonct_Agent']); 
	 $Genre_Agent=htmlspecialchars($_POST['Genre_Agent']); 
	 agent::ajouteragent($Nom_Agent,$Postnom_Agent,$Grade_Agent,$UrlPhoto,$Fonct_Agent,$Genre_Agent,$Email_Agent,$Cle_Agent);			
}
//Modification
if(isset($_GET['IdModAg']) AND !empty($_GET['IdModAg'])){
	$IdModAg=htmlspecialchars($_GET['IdModAg']); 
	echo fagentfiltre($IdModAg); 
}
//Modifier
if(isset($_POST['Nom_Agent']) AND !empty($_POST['Nom_Agent']) AND isset($_POST['Postnom_Agent']) AND !empty($_POST['Postnom_Agent']) AND !isset($_GET['Postnom_Agent']) AND isset($_POST['Email_Agent']) AND !empty($_POST['Email_Agent']) AND isset($_POST['Fonct_Agent']) AND !empty($_POST['Fonct_Agent']) AND isset($_GET['idagentMod'])){
	 $IdAgent=$_GET['idagentMod'];
	  $Nom_Agent=htmlspecialchars($_POST['Nom_Agent']); 
	  $Postnom_Agent=htmlspecialchars($_POST['Postnom_Agent']); 
	  $Email_Agent=htmlspecialchars($_POST['Email_Agent']); 
	  $Cle_Agent=htmlspecialchars($_POST['Cle_Agent']); 
	  $Photo_Agent='URLModif';
	  $Grade_Agent=htmlspecialchars($_POST['Grade_Agent']); 
	  $Fonct_Agent=htmlspecialchars($_POST['Fonct_Agent']); 
	  $Genre_Agent=htmlspecialchars($_POST['Genre_Agent']); 
	
	echo agent::modiferagent($Nom_Agent,$Postnom_Agent,$Photo_Agent,$Grade_Agent, $Fonct_Agent,$Genre_Agent,$Email_Agent,$Cle_Agent,$IdAgent);
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
	session_start();
        echo listeFiltreAgent($RechAgent);	
}
 if(isset($_GET['RechAgent']) AND empty($_GET['RechAgent']))
{
	session_start();
	$RechAgent=htmlspecialchars($_GET['RechAgent']);
	 echo listeAgent();	
}

//AnnalerMod
if (isset($_GET['annuler']) AND !empty($_GET['annuler'])) {
 	echo fagent(); 
 }