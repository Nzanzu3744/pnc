<?php
try
{
    $ordin="localhost";
    $user="root";
    $base="logpnc";
    $pass="";
    $con = new PDO("mysql:host=$ordin;dbname=$base",$user,$pass);
}catch(Exception $e)
{
die('desole, connexion a la Base des données a echoué');
}