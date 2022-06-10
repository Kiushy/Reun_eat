<?php
$message_error = "";

// Traitement du Formulaire
if(isset($_POST) && !empty($_POST)) {
    // Je sais que l'utilisateur a cliqué sur le bouton validé
    $login = $_POST['login'];
    $password = $_POST['password'];

    $auth = new auth();

    if($auth->loadAuth($login, $password)){
        header('Location: index.php');
    }else{
        // Erreur login introuvable
        $message_error = '<div class="login_ko">'.$auth->getError().'</div>';
    }
}
// Génération du code HTML pour le formulaire d'upload d'un fichier image
$html = '<div class="zone_login" id="zone_login">';
$html.= '    <h1>Connexion</h1>';
$html.= '    <form action="index.php?to=session" method="POST" id="myForm" name="myForm">';
$html.= '        <br/>';
$html.= '        <input type="text" name="login" id="login" placeholder="Login"/><br/><br/>';
$html.= '        <input type="password" name="password" id="password" placeholder="Password"/> <br/><br/>';
$html.= '        <input type="submit" value="Connexion" />';
$html.= '    </form>';
$html.= '</div>';
$html.= $message_error;
?>