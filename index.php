<?php
/*
//connexion serveur
$servername = "reun_eat";
$port = "3307";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $port, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/

class data {
    private static $_instance = null;
    private $link = null;
    private $DATABASE = 'reun_eat';     //
    private $SERVEUR = '127.0.0.1';          // 127.0.0.1
    private $PORT = '3307';
    private $USER = 'root';                     //
    private $PASS = '';                     //
    private $die_message_serveur = 'Erreur Serveur';
    private $die_message_bdd = 'Erreur BDD';
    private $data = null;

    private function __construct(){
        // Connexion Serveur
        $this->link = mysqli_connect($this->SERVEUR, $this->PORT,  $this->USER,  $this->PASS) or die($this->die_message_serveur);

        // Connexion BDD
        mysqli_select_db($this->link, $this->DATABASE) or die($this->die_message_bdd);

        // Gestion Encodage
        $sql="SET CHARACTER SET 'utf8mb4';";
        mysqli_query($this->link, $sql);
        $sql="SET collation_connection = 'utf8mb4_general_ci';";
        mysqli_query($this->link, $sql);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inclusion des CSS -->
    <link rel="stylesheet" type="text/css" href="css/common.css"/>


    <title>Document</title>
</head>

<header>
 <!--header -->
    <div class="header">
        <div class="title">
            <img src=""/>
            Reun'Eat
        </div>
        <!--todo menu hamburger -->
        <section class="top-nav">
            <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'></div>
                </label>
                <ul class="menu">
                    <li>One</li>
                    <li>Two</li>
                    <li>Three</li>
                    <li>Four</li>
                    <li>Five</li>
                </ul>
                    </div>
         </section>
</header>

<body>
    <h1>Bienvenu Anon/user</h1>
    <div class="content">
        <div class="en_avant">
            <!--todo défilement d'image + texte pour les mise en avant -->
            <div class="produit_avant" >
                <!--image en fond en fontion du produit-->
                <div class="nom_plat">

            </div>
            <div class="note">
                <!--image en fond depend de la note associé au plat aroudi en dessous if x=-.49 au dessus if x=.5 -->
                <div class="n1">
                </div>
                <div class="n2">
                </div>
                <div class="n3">
                </div>
                <div class="n4">
                </div>
                <div class="n5">
                </div>
            </div>
            <div class="moyenne">
                Moyenne total = x/5
            </div>
            <div class="description">
                Velit minim irure nulla labore aliqua id cupidatat id esse labore excepteur do magna sunt. Sit nostrud cillum veniam proident incididunt Lorem eiusmod. Nulla mollit consectetur occaecat nisi deserunt ipsum ea do tempor. Laborum cupidatat aute eiusmod esse proident tempor id cillum sunt Lorem mollit laborum exercitation. Magna id Lorem dolore aliqua voluptate minim anim. Cupidatat sit veniam veniam anim laborum Lorem mollit occaecat pariatur nisi cupidatat exercitation voluptate. Irure culpa do ipsum voluptate qui veniam.
            </div>

            </div>
            
        </div>

        <div class="type_cuisine">
            <!--todo tableau bouton type de cuisine -->
        </div>  
        <!--footer -->
        <div class="footer">

        </div>
    </div>
</body>
</html>