<?php
session_start();


include('../M/agent.class.php');
//Matricul Cle
if(isset($_POST['Email']) AND !empty($_POST['Email']) AND isset($_POST['Cle']) AND !empty($_POST['Cle'])){

	$Email=htmlspecialchars($_POST['Email']);
	// $key=sha1(htmlspecialchars($_POST['Cle']));
	$key=$_POST['Cle'];
	$tab = agent::connexion($Email);
	if($Info=$tab->fetch()){
		if($Info['Cle_Agent']==$key){
			
				$_SESSION['Agent']=$Info;
				echo $_SESSION['Agent']['Fonct_Agent'].' '.$_SESSION['Agent']['Nom_Agent'].'  '.$_SESSION['Agent']['Postnom_Agent'].' Vous étés Connecté.';
				//Connexion reussi
			
		}else{//Cle Incorect
			echo ' Coordonnes incorect';
		}
	}else{
		echo 'Aucune Information';
		} 
	}else{
			//Aucune Info
		echo 'Veuillez remplir les champs avant de vous connecter !';
	}

	//$_SESSION['IdAgent']['IdAgent'] 