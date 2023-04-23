<?php
include('chaine.php');

class commande {
    public function __construct(){
       
    }
    //////
     public static function ajoutercom($qte,$arme,$idagent){
                global $con;
                $req=$con->prepare('INSERT INTO `tcommande`(`Date_Com`, `Qt_Com`, `Id_Arme`,`Matricul_Agent` ) VALUES (now(),?,?,?)');
                if($req->execute(array($qte,$arme,$idagent))){
                    echo 1;
                }else{
                    echo 0;
                }
        }
    //////
    public static function selectionnercommande(){
        global $con;
        return  $con->query('SELECT * FROM `tcommande` ORDER BY `Date_Com` DESC
        ');
    }
   //////
    public static function Filtrecommande($idCom){
        global $con;
        return  $con->query('SELECT * FROM `tcommande` WHERE Id_Com='.$idCom.' ORDER BY `Date_Com` DESC
        ');
    }
    //
    public static function modifiercommande($idcom,$qte,$arme,$idagent){
                global $con;
                $req=$con->prepare('UPDATE `tcommande` SET `Qt_Com`=?,`Matricul_Agent`=?,`Id_Arme`=? WHERE `Id_Com`=?');
                if($req->execute(array($qte,$idagent,$arme,$idcom))){
                    echo 1;
                }else{
                    echo 0;
                }
        }
    //////
    public static function SuprimerCom($idCom){
        global $con;
        if($con->exec('DELETE FROM `tcommande` WHERE Id_Com='.$idCom)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function __destuct(){
    }
}
//Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`, `Genre_Agent

