<?php

ini_set('session.gc_maxlifetime', 7200);

// Utilise l'encodage interne UTF-8
ini_set('default_charset', 'utf-8');
mb_internal_encoding("UTF-8");

// Chargement de la session
session_name("SITE_NAME");
session_start();


// Traitement si utilisateur connecté
if (!empty($_GET['to']) && isset($page[$_GET['to']])) {
    $url_php = $page[$_GET['to']];
    $isHome = true;
} else {
    if (is_file('is_close')) {
    } else {
        $isHome = true;
    }
}


//connexion serveur
$servername = "localhost: 3307";
$username = "root";
$password = "";

// Create connection
$conn =new mysqli($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


/*
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
*/

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($servername, $username, $password, "reun_eat");


//request mysql
    //request plat
//$bdd_plat = $mysqli->query("SELECT * FROM t_plat WHERE avant="1"");
$query_plat = 'SELECT * FROM t_plat WHERE avant="1"';
$bdd_plat = mysqli_query($mysqli, $query_plat);
$info_p= mysqli_fetch_assoc($bdd_plat);
while($info_plat= mysqli_fetch_array($bdd_plat)){
    foreach($info_plat as $key => $value){
        //echo $key . ' => ' . $value;
        //echo "</br>";
    }
    //echo ($info_p['id']);
        //request commentaire
            //moyenne
    $query_comm_m = 'SELECT AVG(note) AS moyenne FROM t_commentaire WHERE fk_plat = '.$info_p['id'];
    
}
echo $info_p['id'];
    $bdd_comm_m = mysqli_query($mysqli, $query_comm_m);
    $info_comm_m= mysqli_fetch_assoc($bdd_comm_m);
    while ($info_m = mysqli_fetch_array($bdd_comm_m)){
        foreach($info_m as $key => $value){
            echo $key . ' => ' . $value;
            echo "</br>";
        }
        echo $info_comm_m['moyenne'];
    }





//création note
if($info_comm_m['moyenne']==5){
    $html_star= "
                    <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                    </div>
                    <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                    </div>
                    <div class='n3' style='background-image: url(images/interface/full_star.png);'>
                    </div>
                    <div class='n4' style='background-image: url(images/interface/full_star.png);'>
                    </div>
                    <div class='n5' style='background-image: url(images/interface/full_star.png);'>
                    </div>
                ";
}
    elseif($info_comm_m['moyenne']>=4.4){
        $html_star= "
                        <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                        </div>
                        <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                        </div>
                        <div class='n3' style='background-image: url(images/interface/full_star.png);'>
                        </div>
                        <div class='n4' style='background-image: url(images/interface/full_star.png);'>
                        </div>
                        <div class='n5' style='background-image: url(images/interface/half_star.png);'>
                        </div>
                    ";
    }
        elseif($info_comm_m['moyenne']>=4){
            $html_star= "
                            <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                            </div>
                            <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                            </div>
                            <div class='n3' style='background-image: url(images/interface/full_star.png);'>
                            </div>
                            <div class='n4' style='background-image: url(images/interface/full_star.png);'>
                            </div>
                            <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                            </div>
                        ";
        }
            elseif($info_comm_m['moyenne']>=3.4){
                $html_star= "
                                <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                </div>
                                <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                                </div>
                                <div class='n3' style='background-image: url(images/interface/full_star.png);'>
                                </div>
                                <div class='n4' style='background-image: url(images/interface/half_star.png);'>
                                </div>
                                <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                </div>
                            ";
            }
                elseif($info_comm_m['moyenne']>=3){
                    $html_star= "
                                    <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                    </div>
                                    <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                                    </div>
                                    <div class='n3' style='background-image: url(images/interface/full_star.png);'>
                                    </div>
                                    <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                    </div>
                                    <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                    </div>
                                ";
                }
                    elseif($info_comm_m['moyenne']>=2.4){
                        $html_star= "
                                        <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                        </div>
                                        <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                                        </div>
                                        <div class='n3' style='background-image: url(images/interface/half_star.png);'>
                                        </div>
                                        <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                        </div>
                                        <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                        </div>
                                    ";
                    }
                        elseif($info_comm_m['moyenne']>=2){
                            $html_star= "
                                            <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                            </div>
                                            <div class='n2' style='background-image: url(images/interface/full_star.png);'>
                                            </div>
                                            <div class='n3' style='background-image: url(images/interface/empty_star.png);'>
                                            </div>
                                            <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                            </div>
                                            <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                            </div>
                                        ";
                        }
                            elseif($info_comm_m['moyenne']>=1.4){
                                $html_star= "
                                                <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                                </div>
                                                <div class='n2' style='background-image: url(images/interface/half_star.png);'>
                                                </div>
                                                <div class='n3' style='background-image: url(images/interface/empty_star.png);'>
                                                </div>
                                                <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                                </div>
                                                <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                                </div>
                                            ";
                            }
                                elseif($info_comm_m['moyenne']>=1){
                                    $html_star= "
                                                    <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                                    </div>
                                                    <div class='n2' style='background-image: url(images/interface/empty_star.png);'>
                                                    </div>
                                                    <div class='n3' style='background-image: url(images/interface/empty_star.png);'>
                                                    </div>
                                                    <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                                    </div>
                                                    <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                                    </div>
                                                ";
                                }
                                    elseif($info_comm_m['moyenne']>=0.4){
                                        $html_star= "
                                                        <div class='n1' style='background-image: url(images/interface/full_star.png);'>
                                                        </div>
                                                        <div class='n2' style='background-image: url(images/interface/half_star.png);'>
                                                        </div>
                                                        <div class='n3' style='background-image: url(images/interface/empty_star.png);'>
                                                        </div>
                                                        <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                                        </div>
                                                        <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                                        </div>
                                                    ";
                                    }
                                        else($info_comm_m['moyenne']>=0){
                                            $html_star= "
                                                            <div class='n1' style='background-image: url(images/interface/empty_star.png);'>
                                                            </div>
                                                            <div class='n2' style='background-image: url(images/interface/empty_star.png);'>
                                                            </div>
                                                            <div class='n3' style='background-image: url(images/interface/empty_star.png);'>
                                                            </div>
                                                            <div class='n4' style='background-image: url(images/interface/empty_star.png);'>
                                                            </div>
                                                            <div class='n5' style='background-image: url(images/interface/empty_star.png);'>
                                                            </div>
                                                        "
                                        };



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inclusion des CSS -->
    <link rel="stylesheet" type="text/css" href="css/common.css"/>


    <title> Document</title>
</head>

<header>
 <!--header -->
    <div class="header">
        <div class="title">
            <img src=""/>
            Reun'Eat
        </div>

        <!--menu hamburger -->
        
            <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'>
                    </div>
                </label>
                <ul class="menu">
                    <li>loggin</li>
                    <li>recherche</li>
                    <li><?php echo($info_comm_m['moyenne']) ?></li>
                </ul>
    </div>
        
         
</header>

<body>
    <div class="page_title">
        <h1>Bienvenu Anon/user</h1>
    </div>
    <div class="content">
        <div class="en_avant">
            <!--todo défilement d'image + texte pour les mise en avant -->
            <div class="produit_avant" style="background-image: url('images/plats/<?php echo($info_p["photo_plat"]) ?>');" >
                <!--image en fond en fontion du produit-->
                <div class="fleche">
                    <div class="fleche_g" style="background-image: url('images/interface/fleche_g.png');">
                    </div>
                </div>
                <a href="mod/plat.php">
                    <div class="plat">
                        <div class="nom_plat">
                            <?php echo($info_plat["nom_plat"]) ?>
                        </div>
                        
                    <div class="v">
                    </div>

                    <div class="nc">
                        <div class="note">
                            <!--note réaliser avec le php > création note -->
                            <?php echo $html_star?>

                        </div>
                    </div>
                    
                    <div class="mc">
                        <div class="moyenne">
                            Moyenne total = <?php echo $info_comm_m['moyenne']?>/5
                        </div>
                    </div>

                    <div class="dc">
                        <div class="description">
                            <?php echo($info_p["description_plat"]) ?>
                        </div>
                    </div>

                    </div>
                </a>
            </div>
            <div class="fleche">
                <div class="fleche_d"style="background-image: url('images/interface/fleche_d.png');">
                </div>
            </div>
        </div>
            
    </div>

        <div class="type_cuisine">
            <!--todo tableau bouton type de cuisine -->
            <div class="tc_l1">
                <div class="tc_btn" style="background-image: url('images/interface/chinois.png');">
                </div>
                <div class="tc_btn" style="background-image: url('images/interface/japonais.png');">
                </div>
                <div class="tc_btn" style="background-image: url('images/interface/fast_food.png');">
                </div>
            </div>
            <div class="tc_l2">
                <div class="tc_btn"style="background-image: url('images/interface/dessert.png');">
                </div>
                <div class="tc_btn"style="background-image: url('images/interface/mexicain.png');">
                </div>
            </div>
        </div>  
        <!--footer -->
        <div class="footer">

        </div>
    </div>
</body>
</html>