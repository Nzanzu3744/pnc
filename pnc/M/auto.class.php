<?php
include('chaine.php');

class auto {
    public function __construct(){
       
    }
     public static function SupprimerAuto($id){
            global $con;
            if($con->exec('DELETE FROM `tautoport` WHERE Id_PortA='.$id)){
                echo 1;
            }else{
                echo 0;
            }
    }
        public static function ajouterauto($Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tautoport`(`Date_PortA`, `Unite_PortA`, `Num_Arme_PortA`, `Matricul_Agent`, `Id_Usage`, `Id_Arme`,Duree_PortA,NbrMin_PortA) VALUES (NOW(),?,?,?,?,?,?,?)');
                if($req->execute(array($Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin))){
                    echo 1;
                }else{
                    echo 0;
                }
        }
        //
    
    public static function modificationAuto($id,$Unite_PortA,$Num_Arme_PortA,$Matricul_Agent,$Id_Usage,$Id_Arme,$dure,$NbMin){
            global $con;
            if($con->exec('UPDATE `tautoport` SET `Unite_PortA`="'.$Unite_PortA.'",`Num_Arme_PortA`="'.$Num_Arme_PortA.'",`Matricul_Agent`="'.$Matricul_Agent.'",`Id_Usage`="'.$Id_Usage.'",`Id_Arme`="'.$Id_Arme.'",`Duree_PortA`="'.$dure.'",`NbrMin_PortA`="'.$NbMin.'" WHERE `Id_PortA`='.$id)){
                echo 1;
            }else{
                echo 0;
            }
    }
   
   
    // //////
    public static function selectionnerauto(){
        global $con;
        return  $con->query('
        SELECT 
        *
        FROM `tautoport` as taut 
        INNER JOIN tagent as tag 
        ON tag.Matricul_Agent=taut.Matricul_Agent
        INNER JOIN tarme as tarm 
        ON tarm.Id_Arme=taut.Id_Arme
        INNER JOIN tusage as tusa
        ON tusa.Id_Usage=taut.Id_Usage
        ORDER BY `Id_PortA` DESC
        ');
    }
    // //////
    public static function Filtrerauto($var){
        global $con;
        return  $con->query('
        SELECT 
        *
        FROM `tautoport` as taut 
        INNER JOIN tagent as tag 
        ON tag.Matricul_Agent=taut.Matricul_Agent
        INNER JOIN tarme as tarm 
        ON tarm.Id_Arme=taut.Id_Arme
        INNER JOIN tusage as tusa
        ON tusa.Id_Usage=taut.Id_Usage
        WHERE taut.Id_PortA="'.$var.'" OR taut.Num_Arme_PortA ="'.$var.'" OR taut.Date_PortA like "'.$var.'%"
        ORDER BY `Id_PortA` DESC
        ');
    }
    //
     public static function FiltrerautobyId($var){
        global $con;
        return  $con->query('
        SELECT 
        *
        FROM `tautoport` as taut 
        INNER JOIN tagent as tag 
        ON tag.Matricul_Agent=taut.Matricul_Agent
        INNER JOIN tarme as tarm 
        ON tarm.Id_Arme=taut.Id_Arme
        INNER JOIN tusage as tusa
        ON tusa.Id_Usage=taut.Id_Usage
        WHERE taut.Id_PortA='.$var);
    }
    //

    public function __destuct(){
    }
}
//Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`, `Genre_Agent

