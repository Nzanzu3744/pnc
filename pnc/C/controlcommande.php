<?php
include('../M/agent.class.php');
include('../M/entree.class.php');
include('../M/commande.class.php');
// include('../M/auto.class.php');
// include('../v/pages/tableauauto.php');
include('../v/pages/Formulairecommande.php');

// if(isset($_POST['arme']) AND !empty($_POST['arme']) AND isset($_POST['agent']) AND !empty($_POST['agent'])){

		
// 	$Unite_PortA=htmlspecialchars($_POST['unite']);	
// 	$Num_Arme_PortA=htmlspecialchars($_POST['num_arm']);	
// 	$Matricul_Agent=htmlspecialchars($_POST['agent']);
// 	$Id_Usage=htmlspecialchars($_POST['usage']);
// 	$Id_Arme=htmlspecialchars($_POST['arme']);
// 	$dure=htmlspecialchars($_POST['Duree']);
// 	$NbMin=htmlspecialchars($_POST['NbMin']);
	
// 	auto::ajouterauto($Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin);
// }

if(isset($_GET['materiel']) AND !empty($_GET['materiel'])){
	$materiel=htmlspecialchars($_GET['materiel']); 
	echo fcommande($materiel); 
}
if(isset($_GET['materiel']) AND empty($_GET['materiel'])){
	echo 0;
}

if(isset($_GET['Comm_arme']) AND !empty($_GET['Comm_arme']) ){
	 $arme=htmlspecialchars($_GET['Comm_arme']); 
	 $qte=htmlspecialchars($_POST['qte_arm']); 
 
     session_start();
     $idagent=$_SESSION['Agent']['Matricul_Agent'];
	echo commande::ajoutercom($qte,$arme,$idagent);
}
//Qtarme6575

if(isset($_GET['arme6575']) AND !empty($_GET['arme6575']) ){
	 $arme=htmlspecialchars($_GET['arme6575']); 
	 $idcom=htmlspecialchars($_GET['Idcomm987']); 
	 $qt_Com=htmlspecialchars($_GET['qt_Com']); 
	 session_start();
     $idagent=$_SESSION['Agent']['Matricul_Agent'];
	echo commande::modifiercommande($idcom,$qt_Com,$arme,$idagent);
}
if(isset($_GET['comSup']) AND !empty($_GET['comSup']) ){
	 $comSup=htmlspecialchars($_GET['comSup']); 
	echo commande::SuprimerCom($comSup);
}

if(isset($_GET['comMod']) AND !empty($_GET['comMod']) ){
	 $comMod=htmlspecialchars($_GET['comMod']); 
	 session_start();
	echo FrmFiltrecommande($comMod);
}
// }
// //Recherche
//  if(isset($_GET['RechAgent']) AND !empty($_GET['RechAgent']))
// {
// 	$RechAgent=htmlspecialchars($_GET['RechAgent']);
//         echo FiltreAgent($RechAgent);	
// }
//  if(isset($_GET['verifAgent']) AND !empty($_GET['verifAgent']))
// {
// 	$verifAgent=htmlspecialchars($_GET['verifAgent']);
// 	$tab=agent::rechercheagent01($verifAgent)->fetch();
//         if(is_null($tab['Matricul_Agent'])){
//         	echo 0;
//         }else{
//         	echo 1;
//         }	
// }
//  if(isset($_GET['verifstock']) AND !empty($_GET['verifstock']))
// {
// 	$verifstock=htmlspecialchars($_GET['verifstock']);
//         echo FiltreStock($verifstock);	
// }
// if(isset($_GET['rechAut']) AND !empty($_GET['rechAut']))
// {
// 	$rechAut=htmlspecialchars($_GET['rechAut']);
//         echo FiltrerAuto($rechAut);	
// }
// if(isset($_GET['rechAut']) AND empty($_GET['rechAut']))
// {
//         echo listeauto();
// }

// if(isset($_GET['supAuto']) AND !empty($_GET['supAuto']))
// {

//         echo auto::SupprimerAuto($_GET['supAuto']);
// }
// //AnnalerMod
// if (isset($_GET['annuler']) AND !empty($_GET['annuler'])) {
//  	echo fagent(); 
//  }