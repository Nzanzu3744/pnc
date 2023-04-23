<?php
include('chaine.php');

class arme {
    public function __construct(){
       
    }
    //////
    public static function selectionnerarme(){
        global $con;
        return  $con->query('SELECT * FROM `tarme` ORDER BY `Nom_Arme` ASC
        ');
    }
   //////
    public static function filtrerarme($id){
        global $con;
        return  $con->query('
        SELECT
       *
        FROM tarme as tarm
        WHERE Id_Arme="'.$id.'" OR Nom_Arme like "'.$id.'%" OR Model_Arme like "'.$id.'%" ');
    }
     public static function filtrerarmebyId($id){
        global $con;
        return  $con->query('
        SELECT
       *
        FROM tarme as tarm
        WHERE Id_Arme='.$id);
    }
    public function __destuct(){
    }
}
//Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`, `Genre_Agent

