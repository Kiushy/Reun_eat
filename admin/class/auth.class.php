<?php
/**
 * Class auth
 *
 * Permet de gérer l'authentification et les droits des utilisateurs
 *
 * Auteur  : Christophe THIBAULT
 * Date    : 29/03/2022
 * Version : 1.0
 */
class auth{
    private $error_message = "";

    public function __construct(){}

    public function loadAuth($login, $mdp){
        $data = data::getInstance();
        $auth = false;
        $my = new session();

        if(!empty($mdp)) { // empty password
            $login=addslashes($login);

            $sql="SELECT * FROM t_user WHERE login='".$login."' LIMIT 1;";
            $r = $data->getData($sql);

            if(!$r) {
                $this->error_message = "Erreur Connexion - Login Introuvable";
                return false;
            }

            $mdp=md5($mdp);	//md5 encryption

            if( $r[0]['password'] == $mdp){
                $auth = $r[0]['id'];
            } else {
                $this->error_message = "Erreur Connexion - Mot de passe incorrect";
            }

            if($auth){ // set session infos
                $my->add_data_to_session('id_user',$r[0]['id']);
                $my->add_data_to_session('login',$r[0]['login']);
                $my->add_data_to_session('name',$r[0]['prenom'].' '.$r[0]['nom']);
                $my->add_data_to_session('id_lang',$r[0]['fk_langue']);
                $my->add_data_to_session('last_id_message',$r[0]['fk_last_id_chat']);

                // TODO: Gestion des droits d'accès de l'utilisateur
                $sql = "SELECT fk_module FROM t_user_module WHERE fk_user=".$r[0]['id'];
                $datasModule =  $data->getData($sql);
                if($datasModule){
                    foreach($datasModule as $dataModule){
                        switch ($dataModule['fk_module']){
                            case 1:
                                $my->add_data_to_session('canCalendrier',1);
                                break;
                            case 2:
                                $my->add_data_to_session('canGalerie',1);
                                break;
                            case 3:
                                $my->add_data_to_session('canParallax',1);
                                break;
                            case 4:
                                $my->add_data_to_session('canFullpage',1);
                                break;
                            case 5:
                                $my->add_data_to_session('canMosaic',1);
                                break;
                            case 6:
                                $my->add_data_to_session('canChat',1);
                                break;
                        }
                    }
                }

            }
        }
        return $auth;
    }

    public function isAuth(){
        $my = new session();

        if($my->get_data('id_user')){
            if(!defined('ID_USER')) define('ID_USER',$my->get_data('id_user'));
            return true;
        }else{
            return false;
        }
    }

    public function unloadAuth(){
        // Deconnexion de l'utilisateur
        $my = new session();
        $my->unload_session();
    }

    public function getError(){
        return $this->error_message;
    }
}
?>