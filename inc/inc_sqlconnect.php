<?php

// Attention !! Bien mettre a jours les 4 lignes suivantes en fonction de vos configuration //
$DATABASE = 'ifr_web_dev_0822';     //
$SERVEUR = '192.168.56.3';          // 127.0.0.1
$USER = 'root';                     //
$PASS = 'root';                     //

$die_message_serveur = 'Erreur Serveur';
$die_message_bdd = 'Erreur BDD';

$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($SERVEUR,  $USER,  $PASS)) or die($die_message_serveur);

mysqli_select_db($link, $DATABASE) or die($die_message_bdd);

$sql="SET CHARACTER SET 'utf8mb4';";
mysqli_query($link, $sql);
$sql="SET collation_connection = 'utf8mb4_general_ci';";
mysqli_query($link, $sql);

?>