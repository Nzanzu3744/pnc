<?php
include('../M/entree.class.php');
include('../M/commande.class.php');
include('../v/pages/tableauentree.php');
include('../v/pages/Formulaireentree.php');

if(isset($_POST['DocJust']) AND !isset($_GET['IdEngMod'])){
	session_start();
     $Matricul_Agent=$_SESSION['Agent']['Matricul_Agent'];
	
	 $Id_Com=htmlspecialchars($_POST['DocJust']); 
	 $Qt_Entree=htmlspecialchars($_POST['qte_arm']); 
	echo entree::ajouterentree($Qt_Entree,$Matricul_Agent,$Id_Com);			
}
//Modification
if(isset($_GET['IdModEnt']) AND !empty($_GET['IdModEnt'])){
	$IdModEnt=htmlspecialchars($_GET['IdModEnt']); 
	echo fentreefiltre($IdModEnt); 
}
//Modifier
if(isset($_GET['IdEngMod'])){
	$id=$_GET['IdEngMod'];
	session_start();
     $Matricul_Agent=$_SESSION['Agent']['Matricul_Agent'];
	 
	  $NumDocJ_Entree=htmlspecialchars($_POST['DocJust']); 
	  $Qt_Entree=htmlspecialchars($_POST['qte_arm']); 
	 echo entree::modifentree($id,$NumDocJ_Entree,$Qt_Entree,$Matricul_Agent);	
}

//Supprimer
 if(isset($_GET['EntrSup']) AND !empty($_GET['EntrSup']))
{
	
	$EntrSup=htmlspecialchars($_GET['EntrSup']);
	 echo entree::supprimerentree($EntrSup);
	
}
//Recherche
 if(isset($_GET['RechEntree']) AND !empty($_GET['RechEntree']))
{
	session_start();
	$RechEntree=htmlspecialchars($_GET['RechEntree']);
        echo listeFiltreEntre($RechEntree);	
}
 if(isset($_GET['RechEntree']) AND empty($_GET['RechEntree']))
{
	session_start();
	 echo listeEntree();	
}
if (isset($_GET['annuler02']) AND !empty($_GET['annuler02'])) {
	include('../M/arme.class.php');
	echo fentree();
}

if(isset($_GET['verifcommande']) AND !empty($_GET['verifcommande']))
{
	session_start();
	$var=htmlspecialchars($_GET['verifcommande']);
	echo commandeFiltre($var);
}
if(isset($_GET['verifcommande']) AND empty($_GET['verifcommande']))
{
	session_start();
	echo commande();
}
//VeriMt     IdCom VeriMt
if(isset($_GET['VeriMt']) AND !empty($_GET['VeriMt']) AND isset($_GET['IdCom']) AND !empty($_GET['IdCom']))
{
	$IdCom=htmlspecialchars($_GET['IdCom']);
	$VeriMt=htmlspecialchars($_GET['VeriMt']);
	 $tabCom=commande::Filtrecommande($IdCom)->fetch();
     $tablEnt=entree::req_entree_Comm($IdCom)->fetch();
    $Solde=(($tabCom['Qt_Com']-$tablEnt['Entree'])-$VeriMt);
    echo $Solde;
}
if(isset($_GET['IdCom']) AND empty($_GET['IdCom']))
{
	echo 'vide';
}
