<?php
/*
 * @desc 		Engine Web v1.0 - IFR Web Dev
 * @date		29/11/2021 ;;
 * @author		Wilfried METAIS
 */

// Préparation du moteur PHP
require 'inc/framework.php';
$html_wrap = true;

ini_set('session.gc_maxlifetime', 7200);

// Utilise l'encodage interne UTF-8
ini_set('default_charset', 'utf-8');
mb_internal_encoding("UTF-8");

// Gestion d'affichage des erreurs
@error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_GET['e_all'])) ini_set( 'display_errors' , TRUE  );

// Chargement de la session
session_name(SITE_NAME);
session_start();

$user = new auth();
$isHome = false;

if($user->isAuth()){
    // Traitement si utilisateur connecté
    if (!empty($_GET['to']) && isset($page[$_GET['to']])) {
        $url_php = $page[$_GET['to']];
        $isHome = true;
    } else {
        if (is_file('is_close')) {
            $url_php = $page['close'];
        } else {
            $url_php = $page['home'];
            $isHome = true;
        }
    }
}else{
    // Traitement si utilisateur non connecté
    $url_php = $page['session'];
}


// Verification si presence de fichier fonction (_func) pour le module
$url_php_func=str_replace('.php','_func.php',$url_php);
if(is_file($url_php_func)){
    include $url_php_func;
}

$url_php_header=str_replace('.php','_header.php',$url_php);
if(is_file($url_php_header)){
    include $url_php_header;
}

if($html_wrap){
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Style CSS -->
        <link rel="stylesheet" type="text/css" href="css/common.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

        <!-- Inclusion Police TTF -->
        <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>

        <!-- Moteur JS / jQuery -->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.ajax.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <script type="text/javascript" src="js/autoload.js"></script>

        <?php
            // Gestion des inclusions automatiques (head)
            // 'mod/home/home.php' ==> 'mod/home/home_head.php'
            $url_php_head = str_replace('.php', '_head.php', $url_php);
            // Exemple pour le home => home_head.php
            if (is_file($url_php_head)) {
                include $url_php_head;
            } else {
                echo '<title>Formation Web Developpeur - Moteur PHP</title>';
            }
        ?>
    </head>
    <?php
        } // Fin du test if($html_wrap)
        require $url_php;
        if($html_wrap){
    ?>
</html>
<?php
        }
?>