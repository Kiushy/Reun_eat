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
        <h1>Connexion</h1>
    </div>

    <div class="content">

        <div class="connexion">

            <div class="head_connex">
            </div>

            <div class="zne_forml_connex">
                <div class="frml_connex">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        
                        <label>Loggin</label>
                        <input type="text" name="loggin" />
                        <br/>
                        <label>password</label>
                        <input type="password" name="mdp" />
                        <br/>
                        <input type="submit" value="Connexion"/>
                    </form>
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