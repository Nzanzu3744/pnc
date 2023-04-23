<?php
include('chaine.php');

class agent {
    public function __construct(){
       
    }
        public static function ajouteragent($Nom_Agent,$Postnom_Agent,$Grade_Agent,$Photo_Agent,$Fonct_Agent,$Genre_Agent,$Email_Agent,$Cle_Agent)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tagent`(`Nom_Agent`, `Postnom_Agent`, `Grade_Agent`,Photo_Agent,`Fonct_Agent`, Genre_Agent,Email_Agent,Cle_Agent) VALUES (?,?,?,?,?,?,?,?)');
                if($req->execute(array($Nom_Agent,$Postnom_Agent,$Grade_Agent,$Photo_Agent,$Fonct_Agent,$Genre_Agent,$Email_Agent,$Cle_Agent))){
                    echo 1;
                }else{
                    echo 0;
                }
        }
    
    public static function modiferagent($Nom_Agent,$Postnom_Agent,$Photo_Agent,$Grade_Agent, $Fonct_Agent,$Genre_Agent,$Email_Agent,$Cle_Agent,$id)
    {
            global $con;
            if($con->exec('UPDATE `tagent` SET `Nom_Agent`="'.$Nom_Agent.'",`Postnom_Agent`="'.$Postnom_Agent.'",`Grade_Agent`="'.$Grade_Agent.'",Photo_Agent="'.$Photo_Agent.'",`Fonct_Agent`="'.$Fonct_Agent.'",`Genre_Agent`="'.$Genre_Agent.'" ,Email_Agent="'.$Email_Agent.'",Cle_Agent="'.$Cle_Agent.'" WHERE `Matricul_Agent`='.$id)){
                return 1;
            }else{
                return 0;
            }
    }
   
    public static function supprimeragent($id){
            global $con;
            if($con->exec('DELETE FROM `tagent` WHERE Matricul_Agent='.$id)){
                return true;
            }
            else{
                return false;
            }
    }
    //////
    public static function selectionneragent(){
        global $con;
        return  $con->query('SELECT * FROM `tagent` ORDER BY `Matricul_Agent` DESC
        ');
    }
    //////
    public static function rechercheagent($var)
    {
        global $con;
        return $con->query("SELECT * FROM `tagent`        
        WHERE `Matricul_Agent` ='".$var."' OR Nom_Agent LIKE '%".$var."%' OR Postnom_Agent LIKE '%".$var."%' OR Grade_Agent LIKE '%".$var."%'  OR Fonct_Agent LIKE '%".$var."%' OR Genre_Agent LIKE '%".$var."%'        
       ");
    }
    public static function connexion($var)
    {
        global $con;
        return $con->query("SELECT * FROM `tagent`        
        WHERE `Email_Agent` ='".$var."'");
    }
    //
    public static function rechercheagent01($var){
        global $con;
        return $con->query("SELECT * FROM `tagent`        
        WHERE `Matricul_Agent` =".$var); 
    }
    public function __destuct(){
    }
}
//Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`, `Genre_Agent

