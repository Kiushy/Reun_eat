<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inclusion des CSS -->
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>


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
                </ul>
    </div>
        
         
</header>

<body>
    <div class="page_title">
        <h1>Plat1</h1>
    </div>
    <div class="content">
        <div class="l1">
            <div class="image">
            </div>
            <div class="info">
                <div class="type_plat">
                    <div class="tc_btn" style="background-image: url('../images/interface/chinois.png');">
                    </div>
                    <div class="tc_btn" style="background-image: url('../images/interface/japonais.png');">
                    </div>
                </div>
                <div class="c_note_plat">
                    <div class="note_plat">
                                <!--image en fond depend de la note associé au plat aroudi en dessous if x=-.49 au dessus if x=.5 -->
                        <div class="n1" style="background-image: url('../images/interface/full_star.png');">
                        </div>
                        <div class="n2" style="background-image: url('../images/interface/full_star.png');">
                        </div>
                        <div class="n3" style="background-image: url('../images/interface/full_star.png');">
                        </div>
                        <div class="n4" style="background-image: url('../images/interface/half_star.png');">
                        </div>
                        <div class="n5" style="background-image: url('../images/interface/empty_star.png');">
                        </div>
                    </div>
                    <div class="moyenne">
                                Moyenne total = x/5
                    </div>
                </div>
            </div>
            <div class="commande">
                <div class="btn_commande" style="background-image: url('../images/interface/btn_commande.png');">
                </div>
                <div class="temps">
                    commande disponible a partir de xx:xx 
                </div>
            </div>
        </div>
        <div class="l2">
            <div class="description_plat">
                <div class="descr_titre">
                    Description
                </div>
                <div class="descr_texte">
                </div>
            </div>
            <div class="commentaire">
            <div class="comm_titre">
                    Commentaire
                </div>
                <div class="comm_texte">
                </div>
            </div>
        </div>
    </div>  
        <!--footer -->
        <div class="footer">

        </div>
    </div>
</body>
</html>