<?php
include('TeteAcces.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pnc_ituri</title>
   
 
  <meta name="viewport" content="width=device-width, initial-scale=1">


   <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Danger au script ci dessous -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 
</head>
<body class=" ">
<!-- Site wrapper -->
<div class="wrapper" style="font-size: 18px">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
  </nav>

  
  <aside class="main-sidebar sidebar elevation-4">
    <!-- Logo -->
      <H5 style="margin-top: 5px;" >PNC-BUNIA</H5>
    <!-- Sidebar -->
    <div class="sidebar" >
      <div class="">
         
      </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
if($_SESSION['Agent']['Fonct_Agent']=='Com_Prov' || $_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

  ?>
     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                COMMANDES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             
            <ul class="nav nav-treeview">
              <?php
            if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){

                ?>
              <li class="nav-item">
                <a href="AjouterCommande.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Com.</p>
                </a>
              </li>
              <?php
            }
              ?>
              <li class="nav-item">
                <a href="ListeCommande.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Com.</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
        }
          if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain' || $_SESSION['Agent']['Fonct_Agent']=='Sous_Com'){
       ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AGENTS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterAgent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Agent</p>
                </a>
              </li>
            </ul>
          </li>
          <?php

        }
            if($_SESSION['Agent']['Fonct_Agent']=='Logisticier' ){

            
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                STOCK MATERIEL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterEntree.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entrer Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AjouterSortie.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sortie Stock</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
        }
          
            if($_SESSION['Agent']['Fonct_Agent']=='Sous_Com' || $_SESSION['Agent']['Fonct_Agent']=='Sous_Com'){

            
          ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AUTORISATION P.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterAuto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Auto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ListeAuto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Auto</p>
                </a>
              </li>
            </ul>
          </li>

            <?php
                }
            ?>

      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid" style="font-style: bold">
        <div class="row mb-1"> 
          <div class="col-sm-6 row">
          <a href="acceuil.php" class="nav-link">Acceuil
          </a>
            
            <?php echo '   <i style="Margin-top:10px">  '.$_SESSION['Agent']['Nom_Agent'].''.$_SESSION['Agent']['Postnom_Agent'].'</i>'; ?>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" onclick="destruction()"><a href="login.php">Déconnection</a></li>
            </ol>
          </div>
        </div>
        <script type="text/javascript">
          function destruction(){
          $.ajax({
            type:"Get",
            url:"../../C/Deconnectio.php?Decon=1",
            success:function(serveur){
              if (serveur==true){
                document.location.href='login.php';
              }
            }
          });
        }
        </script>

  
<!-- if($_SESSION['Agent']['Fonct_Agent']=='Com_Prov'){
      echo "Bienvenu au Bureau du Commissariat Provincial !"; 
    }if($_SESSION['Agent']['Fonct_Agent']=='Com_Urbain'){
      echo "Bienvenu au Bureau du Commissariat Urbain ! "; 
    }if($_SESSION['Agent']['Fonct_Agent']=='Logisticier'){
      echo "Bienvenu a la Logistique Urbain !"; 
    }if($_SESSION['Agent']['Fonct_Agent']=='Sous_Com'){
      echo "Bienvenu au Sous Commissariat !";  -->