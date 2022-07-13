

<?php
$bdd=data::getInstance();
$session=new session();

$ajax_action_post = '';
$ajax_action_get = '';
if(isset($_POST['_ajax_action'])) $ajax_action_post = $_POST['_ajax_action'];
if(isset($_GET['_ajax_action'])) $ajax_action_get = $_GET['_ajax_action'];

$ajax_action = $ajax_action_get;
if($ajax_action_post != "") $ajax_action = $ajax_action_post;

if($ajax_action){
    switch($ajax_action){

        case "save_mea_page":
             $session->add_data_to_session('image_page_galerie', $_POST['image_page']);
             $session->add_data_to_session('page_galerie', 0);
             // Refresh de la zone miniature
             $js = "_ajax_post('mea');";
             to_ajax_eval($js);
             break;

        case 'mea':
            
            $mea="";
            //compte nbr entré
            $nbr_mea = $bdd->squery('SELECT COUNT(*) FROM t_plat WHERE avant="1"');
            $scanned_directory = $bdd->squery('SELECT * FROM t_plat WHERE avant="1"');
            // Verification des données en sessions
            if($session->get_data('page_galerie') == false){
                $session->edit_data_to_session('page_galerie',0);
            }
            // Sauvegarde des données en sessions
            $numero_page =  $session->get_data('page_galerie') + ((isset($_POST['sens']))? (($_POST['sens']==0) ? -1: 1 ) : 0 );
            
            $session->edit_data_to_session('page_galerie',$numero_page);

            
            if($nbr_mea>$nb_image_page){
                // On decoupe le tableau d'image
                $scanned_directory = array_chunk($scanned_directory, $nb_image_page);

               /* foreach($scanned_directory[$numero_page] as $file){
                    to_ajax_dbug($file);
                $mea .= '<div class="zne_content">';
                $mea .='    <div class="en_avant">'; 
                $mea .= '       <div class="produit_avant" id="parallax" style="background-image: url(images/plats/'.$file['photo_plat'].')";>';
                
                }*/

                // Gestion de la pagination gauche
                if($numero_page > 0){

                    $mea .= '<div class="zne_content">';
                    $mea .='    <div class="en_avant">'; 
                    $mea .= '       <div class="produit_avant" id="parallax" style="background-image: url(images/plats/'.$photo_p.')";>';

                    // Fleche précédente
                    $mea .= '        <div class="fleche">';
                    $mea .= '           <a href="#" onclick="mea(0); return false;">';
                    $mea .= '               <div class="fleche_g" style="background-image: url(images/interface/fleche_g.png);">';
                    $mea .= '               </div>';
                    $mea .= '           </a>';
                    $mea .= '        </div>';
                    
                    $mea .= '';
                }

                // Gestion de l'affichage de la vignette en cours
                foreach($scanned_directory[$numero_page] as $file){
                    $mea .= '       <a href="mod/plat.php">';
                    $mea .= '           <div class="plat">';
                    $mea .= '               <div class="nom_plat">';
                    $mea .= '       '           .$file['nom_plat'].;
                    $mea .= '               </div>';
                        
                    $mea .= '               <div class="v">';
                    $mea .= '               </div>';

                    $mea .= '               <div class="nc">';
                    $mea .= '                   <div class="note">';
                
                            //note réaliser avec le php > création note 
                        if(isset($info_comm_m)){
                        $mea .= ''     .$html_star.;

                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        
                        $mea .= '           <div class="mc">';
                        $mea .= '               <div class="moyenne">';
                        $mea .= '                    Moyenne total ='.$info_comm_m.'/5';
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        $mea .= '   </a>'
                        }else{
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        
                        $mea .= '           <div class="mc">';
                        $mea .= '               <div class="moyenne">';
                        $mea .= '                   soyé le premier a donné une note';
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        }

                    $mea .= '               <div class="dc">';
                    $mea .= '                   <div class="description">';
                    $mea .= ''                      .$file["description_plat"].;
                    $mea .= '                   </div>';
                    $mea .= '               </div>';
                    }
                }
                    // Gestion de la pagination droite
                if(isset($scanned_directory[$numero_page+1]) && !empty($scanned_directory[$numero_page+1])){
                    // Fleche suivante
                    $mea .= '               <div class="fleche">';
                    $mea .= '                   <a href="#" onclick="mea(0); return false;">';
                    $mea .= '                       <div class="fleche_d" style="background-image: url(images/interface/fleche_d.png);">';
                    $mea .= '                       </div>';
                    $mea .= '                   </a>';
                    $mea .= '               </div>';
                }else{
                    // Gestion de l'affichage de la vignette en cours
                foreach($scanned_directory[$numero_page] as $file){
                    $mea .= '       <a href="mod/plat.php">';
                    $mea .= '           <div class="plat">';
                    $mea .= '               <div class="nom_plat">';
                    $mea .= '       '           .$file['nom_plat'].;
                    $mea .= '               </div>';
                        
                    $mea .= '               <div class="v">';
                    $mea .= '               </div>';

                    $mea .= '               <div class="nc">';
                    $mea .= '                   <div class="note">';
                
                            //note réaliser avec le php > création note 
                        if(isset($info_comm_m)){
                        $mea .= ''     .$html_star.;

                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        
                        $mea .= '           <div class="mc">';
                        $mea .= '               <div class="moyenne">';
                        $mea .= '                    Moyenne total ='.$info_comm_m.'/5';
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        $mea .= '   </a>'
                        }else{
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        
                        $mea .= '           <div class="mc">';
                        $mea .= '               <div class="moyenne">';
                        $mea .= '                   soyé le premier a donné une note';
                        $mea .= '               </div>';
                        $mea .= '           </div>';
                        }

                    $mea .= '               <div class="dc">';
                    $mea .= '                   <div class="description">';
                    $mea .= ''                      .$file["description_plat"].;
                    $mea .= '                   </div>';
                    $mea .= '               </div>';
                    }
                }

                    to_ajax('set','zone_mea',$mea);
                    break;
                
    }
}

?>