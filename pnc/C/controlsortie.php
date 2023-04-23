<?php
include('../M/sortie.class.php');
include('../M/entree.class.php');
include('../M/arme.class.php');
include('../v/pages/tableausortie.php');
include('../v/pages/Formulairesortie.php');
// 
if(isset($_GET['arme']) AND !empty($_GET['arme']) AND isset($_POST['benef']) AND !empty($_POST['benef']) AND isset($_POST['qte_arm']) AND !empty($_POST['qte_arm']) AND !isset($_GET['IdEngMod'])){
	$Id_Arme=$_GET['arme'];
	$IdBenef=htmlspecialchars($_POST['benef']);
	$Qt_sortie=htmlspecialchars($_POST['qte_arm']);
	session_start();
     $Matricul_Agent=$_SESSION['Agent']['Matricul_Agent'];
	
	echo sortie::ajoutersortie($Qt_sortie,$Matricul_Agent, $Id_Arme, $IdBenef);			
}
//Modification
if(isset($_GET['IdModSort']) AND !empty($_GET['IdModSort'])){

	$IdModSort=htmlspecialchars($_GET['IdModSort']); 
    echo fsortiefiltre($IdModSort); 
}
// //Modifier
if(isset($_GET['arme']) AND !empty($_GET['arme']) AND isset($_POST['benef']) AND !empty($_POST['benef']) AND isset($_POST['qte_arm']) AND !empty($_POST['qte_arm']) AND isset($_GET['IdEngMod'])){

	    $id=$_GET['IdEngMod'];
	    $Id_Arme=$_GET['arme'];
	    $Benef=htmlspecialchars($_POST['benef']);
	    $Qt_Sortie=htmlspecialchars($_POST['qte_arm']);
	    session_start();
     $Matricul_Agent=$_SESSION['Agent']['Matricul_Agent'];

	  sortie::modifsortie($id,$Qt_Sortie,$Matricul_Agent,$Id_Arme,$Benef);
	 echo fsortie($Id_Arme);	
}

//Supprimer
 if(isset($_GET['SortSup']) AND !empty($_GET['SortSup']))
{
	
	$SortSup=htmlspecialchars($_GET['SortSup']);
	 echo sortie::supprimersortie($SortSup);
	
}
//
if(isset($_GET['RechSolde']) AND !empty($_GET['RechSolde']))
{
	session_start();
	$RechSolde=htmlspecialchars($_GET['RechSolde']);
        echo FiltreSolde($RechSolde);	
}
 if(isset($_GET['RechSolde']) AND empty($_GET['RechSolde']))
{
	session_start();
	 echo Solde();	
}


 if(isset($_GET['RechSortie']) AND !empty($_GET['RechSortie']))
{
	$RechSortie=htmlspecialchars($_GET['RechSortie']);
        echo listeFiltreSortie($RechSortie);	
}
 if(isset($_GET['RechSortie']) AND empty($_GET['RechSortie']))
{
	 echo listeSortie();	
}

if(isset($_GET['RecSort']) AND !empty($_GET['RecSort']) ){
	echo fsortie($_GET['RecSort']);
}
if(isset($_GET['IdArme']) AND isset($_GET['Qte'])){
	 	$EntreTab=entree::req_entree($_GET['IdArme']);
  		$SortieTab=sortie::req_sortie($_GET['IdArme']);
  		$DonneeEntree=$EntreTab->fetch();
  		$DonneeSortie=$SortieTab->fetch();
  		$Solde=($DonneeEntree['Entree']-$DonneeSortie['Sortie']);
	
	if($Solde>=$_GET['Qte']){
		echo 1;
	}else {
		echo 0;
	}
}