<?php
$session=new session();
$bdd=data::getInstance();

//request mysql
    //request plat
//$bdd_plat = $mysqli->query("SELECT * FROM t_plat WHERE avant="1"");
$query_plat = 'SELECT * FROM t_plat WHERE avant="1"';
//$bdd_plat = mysqli_query($mysqli, $query_plat);
$bdd_plat =$bdd->query($query_plat);
//$info_p= mysqli_fetch_assoc($bdd_plat);
$info_p="";
foreach($bdd_plat as $plat){
 $id_p= $plat['id'];
   $nom_p= $plat['nom_plat'];
   $description_p= $plat['description_plat'];
   $photo_p= $plat['photo_plat'];
    
    
}
//dbug ($id_p);
    //echo ($info_p['id']);
        //request commentaire
            //moyenne
    $query_comm_m = 'SELECT AVG(note) AS moyenne FROM t_commentaire WHERE fk_plat = '.$id_p;
    
    //$bdd_comm_m = mysqli_query($mysqli, $query_comm_m);
    $info_comm_m = $bdd->squery($query_comm_m);
    //$info_comm_m= mysqli_fetch_assoc($bdd_comm_m);

//création moyenne etoile
if($info_comm_m==5){
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
    elseif($info_comm_m>=4.4){
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
        elseif($info_comm_m>=4){
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
            elseif($info_comm_m>=3.4){
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
                elseif($info_comm_m>=3){
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
                    elseif($info_comm_m>=2.4){
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
                        elseif($info_comm_m>=2){
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
                            elseif($info_comm_m>=1.4){
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
                                elseif($info_comm_m>=1){
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
                                    elseif($info_comm_m>=0.4){
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
                                        else($info_comm_m>=0){
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


    
    $html = '<body>
                <div class="page_title">
                    <h1>Bienvenu Anon/user</h1>
                </div>';
/*  $html = '   <div class="zne_content">
                    <div class="en_avant">';

                        //todo défilement d'image + texte pour les mise en avant
   $html .= '          <div class="produit_avant" id="parallax" style="background-image: url(images/plats/'.$photo_p.')";>';

                           //image en fond en fontion du produit
   $html .= '                <div class="fleche">
                                <div class="fleche_g" style="background-image: url(images/interface/fleche_g.png);">
                                </div>
                            </div>
                            <a href="mod/plat.php">
                                <div class="plat">
                                    <div class="nom_plat">
                                        '.$nom_p.'
                                    </div>
                                    
                                <div class="v">
                                </div>

                                <div class="nc">
                                    <div class="note">';

                                        //note réaliser avec le php > création note 
    if(isset($info_comm_m)){
        $html .= '                        '.$html_star.'

                                    </div>
                                </div>
                                
                                <div class="mc">
                                    <div class="moyenne">
                                        Moyenne total ='.$info_comm_m.'/5
                                    </div>
                                </div>';
    }else{
        $html .= '                  </div>
                                </div>
                                
                                <div class="mc">
                                    <div class="moyenne">
                                        soyé le premier a donné une note
                                    </div>
                                </div>';
                            }

    $html .= '                  <div class="dc">
                                    <div class="description">
                                        '.$description_p.'
                                    </div>
                                </div>

                                </div>
                            </a>
                            <div class="fleche">
                                <div class="fleche_d" style="background-image: url(images/interface/fleche_d.png)";>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                        
                </div>*/

    $html .='<div class="zone_mea" id="zone_mea">';
    $html .='</div> ';

    $html .= '            <div class="type_cuisine">';
                        //todo tableau bouton type de cuisine
    $html .= '           <div class="tc_l1">
                            <div class="tc_btn" style="background-image: url(images/interface/chinois.png);">
                            </div>
                            <div class="tc_btn" style="background-image: url(images/interface/japonais.png);">
                            </div>
                            <div class="tc_btn" style="background-image: url(images/interface/fast_food.png);">
                            </div>
                        </div>
                        <div class="tc_l2">
                            <div class="tc_btn" style="background-image: url(images/interface/dessert.png);">
                            </div>
                            <div class="tc_btn" style="background-image: url(images/interface/mexicain.png);">
                            </div>
                        </div>
                    </div>  
                    
                </div>';
?>