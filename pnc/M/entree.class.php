<?php
include('chaine.php');

class entree {
    public function __construct(){
       
    }
        public static function ajouterentree($Qt_Entree,$Matricul_Agent,$Id_Com)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tentree_st`(`Date_Entree`, `Qt_Entree`, `Matricul_Agent`, `Id_Com`) VALUES (NOW(),?,?,?)');
                if($req->execute(array($Qt_Entree,$Matricul_Agent,$Id_Com))){
                    echo 1;
                }else{
                    echo 0;
                }
        }
    
    public static function modifentree($id,$NumDocJ_Entree,$Qt_Entree,$Matricul_Agent)
    {
            global $con;
            if($con->exec('UPDATE `tentree_st` SET `Id_Com`="'.$NumDocJ_Entree.'",`Qt_Entree`="'.$Qt_Entree.'",`Matricul_Agent`="'.$Matricul_Agent.'" WHERE `Id_Entree`='.$id)){
                echo 1;
            }else{
                echo 0;
            }
    }
   
    public static function supprimerentree($id){
            global $con;
            if($con->exec('DELETE FROM `tentree_st` WHERE Id_Entree='.$id)){
                return true;
            }
            else{
                return false;
            }
    }
    //////
    public static function selectionnerentree(){
        global $con;
        return  $con->query('
            SELECT *
            FROM tentree_st AS tent 
            INNER JOIN tagent as tag 
            ON tag.Matricul_Agent=tent.Matricul_Agent
            INNER JOIN tcommande as tcom 
            ON tcom.Id_Com=tent.Id_Com
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tcom.Id_Arme
            ORDER BY tent.Id_Entree DESC
            ');
    }
    public static function rechercheentre($var)
    {
        global $con;
        return $con->query("
         SELECT *
            FROM tentree_st AS tent 
            INNER JOIN tagent as tag 
            ON tag.Matricul_Agent=tent.Matricul_Agent
            INNER JOIN tcommande as tcom 
            ON tcom.Id_Com=tent.Id_Com
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tcom.Id_Arme
            
        WHERE `Date_Entree` like '".$var."%' OR tcom.Id_Com = '".$var."' OR Nom_Arme LIKE '".$var."' OR Model_Arme LIKE '".$var."'      
        ORDER BY tent.Id_Entree DESC   
       ");
    }
    //Recherche precise avec id pour la modification
    public static function recherche01($var)
    {
        global $con;
        return $con->query("
        SELECT *
            FROM tentree_st AS tent 
            INNER JOIN tagent as tag 
            ON tag.Matricul_Agent=tent.Matricul_Agent
            INNER JOIN tcommande as tcom 
            ON tcom.Id_Com=tent.Id_Com
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tcom.Id_Arme
        WHERE `Id_Entree` = ".$var);
    }
     public static function req_entree($idArm)
    {
        global $con;
        return $con->query("
        SELECT
        tarm.Id_Arme,
        tarm.Nom_Arme,
        tarm.Model_arme,
        SUM(Qt_Entree) as Entree
        FROM tentree_st as tent
         INNER JOIN tcommande as tcom 
            ON tcom.Id_Com=tent.Id_Com
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tcom.Id_Arme
        WHERE tarm.Id_Arme=".$idArm);
    }
    public static function req_entree_Comm($idAcom)
    {
        global $con;
        return $con->query("
        SELECT
        tarm.Id_Arme,
        tarm.Nom_Arme,
        tarm.Model_arme,
        SUM(Qt_Entree) as Entree
        FROM tentree_st as tent
         INNER JOIN tcommande as tcom 
            ON tcom.Id_Com=tent.Id_Com
            INNER JOIN tarme as tarm 
            ON tarm.Id_Arme=tcom.Id_Arme
        WHERE tcom.Id_Com=".$idAcom);
    }
    public function __destuct(){
    }
}

