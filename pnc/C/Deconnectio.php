<?php
if(isset($_GET['Decon']) AND !empty($_GET['Decon'])){
	session_start();
	$_SESSION = array();
    session_destroy();
  return true;
}
?>