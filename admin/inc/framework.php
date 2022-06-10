<?php
/**
 * Gestion de l'inclusion des fichiers nécessaire au bon fonctionnement de l'application
 */

// Parametres
require 'param/param_engine.php';
require 'param/param_global.php';

// BDD
require 'class/data.class.php';
// require 'inc/inc_sqlconnect.php';
// require 'inc/inc_sqlquery.php';

// Fonctions communes
require 'inc/func_common.php';
require 'inc/func_ajax.php';

// Classes
require 'class/session.class.php';
require 'class/auth.class.php';
require 'class/page.class.php';

?>