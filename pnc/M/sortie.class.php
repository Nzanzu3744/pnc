<?php
include('chaine.php');

class sortie {
    public function __construct(){
       
    }
        public static function ajoutersortie($Qt_sortie,$Matricul_Agent, $Id_Arme, $IdBenef)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tsortie_st`(`Date_sortie`, `Qt_Sortie`, `Matricul_Agent`, `Id_Arme`,`Benef`) VALUES (NOW(),?,?,?,?)');
                if($req->execute(array($Qt_sortie,$Matricul_Agent, $Id_Arme, $IdBenef))){
                    return 1;
                }else{
                    return 0;
                }
        }
    
    public static function modifsortie($id,$Qt_Sortie,$Matricul_Agent,$Id_Arme,$Benef)
    {
            global $con;
            if($con->exec('UPDATE `tsortie_st` SET `Qt_Sortie`="'.$Qt_Sortie.'",`Matricul_Agent`="'.$Matricul_Agent.'",`Id_Arme`="'.$Id_Arme.'",`Benef`="'.$Benef.'" WHERE `Id_sortie`="'.$id.'"')){
                echo 1;
            }else{
                echo 0;
            }
    }
   
    public static function supprimersortie($id){
            global $con;
            if($con->exec('DELETE FROM `tsortie_st` WHERE Id_sortie='.$id)){
                return true;
            }
            else{
                return false;
            }
    }
    /**/
    public static function selectionnersortie(){
        global $con;
        return  $con->query('
            SELECT *
            FROM tsortie_st AS tsort 
            INNER JOIN tagent as tag 
            ON tag.Matricul_Agent=tsort.Matricul_Agent
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tsort.Id_Arme
            ORDER BY tsort.Id_sortie DESC
            ');
    }
    public static function recherchesortie($var)
    {
        global $con;
        return $con->query("
        SELECT *
        FROM tsortie_st AS tsort 
        INNER JOIN tagent as tag 
        ON tag.Matricul_Agent=tsort.Matricul_Agent
        INNER JOIN tarme as tarm 
        ON tarm.Id_Arme=tsort.Id_Arme
        WHERE Id_Sortie='".$var."'OR `Date_sortie` like '".$var."%' OR `Benef` like '".$var."%' OR Nom_Arme LIKE '".$var."%' OR Model_Arme LIKE '".$var."%'      
        ORDER BY tsort.Id_sortie DESC   
       ");
    }
    //Recherche precise avec id pour la modification
    public static function recherche01($var)
    {
        global $con;
        return $con->query("
        SELECT *
        FROM tsortie_st AS tent 
        INNER JOIN tagent as tag 
        ON tag.Matricul_Agent=tent.Matricul_Agent
        INNER JOIN tarme as tarm 
        ON tarm.Id_Arme=tent.Id_Arme
        WHERE `Id_sortie` = ".$var);
    }
    
     public static function fil_solde($var)
    {
        global $con;
        return $con->query("SELECT
        tarm.Id_Arme,
        tarm.Nom_Arme,
        tarm.Model_arme,
        SUM(Qt_Sortie) as Sortie,
        SUM(Qt_Entree) as Entree,
        (SUM(Qt_Entree)-SUM(Qt_Sortie)) as Solde
        FROM tarme as tarm
         LEFT JOIN tentree_st as tent
        ON tarm.Id_Arme=tent.Id_Arme 
         LEFT JOIN tsortie_st AS tsort
        ON tarm.Id_Arme=tsort.Id_Arme
        
        WHERE tarm.Id_Arme='".$var."' OR `Nom_Arme` like '".$var."%' OR Model_arme LIKE '".$var."%'
        GROUP BY TARM.Id_Arme
        ORDER BY tarm.Nom_Arme");
    }
     public static function req_sortie($idArm)
    {
        global $con;
        return $con->query("
        SELECT
        tarm.Id_Arme,
        tarm.Nom_Arme,
        tarm.Model_arme,
        SUM(Qt_Sortie) as Sortie
        FROM tsortie_st as tsort
        INNER JOIN tarme as tarm
        ON tarm.Id_Arme =tsort.Id_Arme
        WHERE tsort.Id_Arme=".$idArm);
    }
    public function __destuct(){
    }
}

