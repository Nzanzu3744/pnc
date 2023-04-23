<?php
class Upload_file{
    /*La classe qui nous permet d'envoyer une photo de profile. Elle prend en charge trois fonctions :
        *La fonction envoi_photo, getNom_du_fichier et 
        *La fonction getDossier
    */
    private $tmp_name = "";
    private $file_size = "";
    private $extension_recu = "";
    private $extension_autorisee = "";
    private $fichier = "";
    private $dossier = "";
    private $file_error = "";
    private $nom_du_fichier = "";
    private $file_name = "";
    public function __construct($nom_du_input){
        $this->tmp_name = $_FILES[$nom_du_input]['tmp_name'];
        $this->file_size = $_FILES[$nom_du_input]['size'];
        $this->fichier = pathinfo($_FILES[$nom_du_input]['name']);
        $this->extension_recu = strtolower($this->fichier['extension']);
        $this->file_error = $_FILES[$nom_du_input]['error'];
        $this->file_name = $_FILES[$nom_du_input]['name'];
    }
// fonction de l'envoie du fichier image
    public function envoi_photo($nom_du_dossier){
        // verification de la presence du fichier
        if($this->file_error == 0){
            // test de la taille du fichier
            
            if($this->file_size <= 4200000){
                // verification de l'existance du dossier
                if(!is_dir($nom_du_dossier)){
                    mkdir($nom_du_dossier);
                }
            // verification de l'extension recue si elle coorespond
            $this->extension_autorisee = array('png','jpeg','jpg','gif');
            if(in_array($this->extension_recu, $this->extension_autorisee)){
                $this->dossier = $nom_du_dossier;
                $this->nom_du_fichier = strtolower(uniqid(rand()).'_'.$this->file_name);
                move_uploaded_file($this->tmp_name, $this->dossier."/".basename($this->nom_du_fichier));
                // return $this->nom_du_fichier;
            }
                
            }
        }
    }
    // fonction qui retourne le nom du fichier
    public function getNom_du_fichier(){
        return $this->nom_du_fichier;
    }
    // fonction qui retourne le nom du dossier
    public function getDossier(){
        return $this->dossier;
    }


}
