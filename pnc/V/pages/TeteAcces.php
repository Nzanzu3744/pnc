<?php
session_start();
if(!isset($_SESSION['Agent'])){
	
		header('location:login.php');
	
}
if(isset($_SESSION['Agent']['Fonct_Agent'])){
	if($_SESSION['Agent']['Fonct_Agent']=='Aucun'  OR $_SESSION['Agent']['Fonct_Agent']=='Porteur'){
		header('location:login.php');
	}
}