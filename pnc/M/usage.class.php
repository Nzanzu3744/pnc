<?php
include('chaine.php');

class usage {
    public function __construct(){
       
    }
    //////
    public static function selectionnerusage(){
        global $con;
        return  $con->query('SELECT * FROM `tusage` ORDER BY `Usage` ASC
        ');
    }
   //////
   public static function selectionnerusagebyId($id){
        global $con;
        return  $con->query('SELECT * FROM `tusage` WHERE Id_Usage='.$id);
    }
   
   
    public function __destuct(){
    }
}
//Nom_Agent`, `Postnom_Agent`, `Grade_Agent`, `Fonct_Agent`, `Genre_Agent

