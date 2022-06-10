<?php
/**
 * Class session
 *
 * Permet de gérer les sessions des utilisateur
 *
 * Auteur  : Christophe THIBAULT
 * Date    : 29/03/2022
 * Version : 1.0
 */

class session{
    // Variables de class
    private $id_user = 0;
    private $session_name = SITE_NAME;

    // Constructeur
    public function __construct(){
        if(isset($_SESSION[$this->session_name]['id_user']) && $_SESSION[$this->session_name]['id_user']){
            $this->id_user = $_SESSION[$this->session_name]['id_user'];
        }
    }

    // Methodes Public

    // Permet de recuperer une variable de session
    public function get_data($offset){
        if(isset($_SESSION[$this->session_name][$offset]))
            return $_SESSION[$this->session_name][$offset];
        else
            return false;
    }

    // Permet de modifier une variable de session
    public function edit_data_to_session($offset, $data){
        if(isset($_SESSION[$this->session_name][$offset])) {
            unset($_SESSION[$this->session_name][$offset]);
            $_SESSION[$this->session_name][$offset] = $data;
        } else {
            $this->add_data_to_session($offset, $data);
        }
    }

    // Permet d'ajouter une variable de session
    public function add_data_to_session($offset, $data){
        $_SESSION[$this->session_name][$offset] = $data;
    }

    // Permet de supprimer une variable de session
    public function delete_data_to_session($offset){
        unset($_SESSION[$this->session_name][$offset]);
    }

    public function unload_session(){
        unset($_SESSION[$this->session_name]);
    }

    // Permet de vérifier si l'utilisateur est connecté
    public function isRegistered(){
        if($this->id_user)
            return true;
        else
            return false;
    }

    // Gestion des droits de l'utilsateur en session
    public function isUserCan($right){
        if(isset($_SESSION[$this->session_name]['can'.$right]) && $_SESSION[$this->session_name]['can'.$right])
            return true;
        else
            return false;
    }

}

?>