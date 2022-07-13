<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$().ready(function(){
        $('#btn_loggin').on('click', function(){
            $('#zone_connexion').toggle(1000);
        });
    });

</script>

<?php
    // Interface Front Office

    class page{
        private $header = '';
        private $footer = '';
        private $corps = '';

        // Constructeur
        public function __construct($showUi = true, $encaps_content = true){
            if($showUi) {
                $this->build_header($encaps_content);
                $this->build_footer($encaps_content);
            }else{
                $this->header = '<body>';
                $this->footer = '</body>';
            }
        }

        private function build_header($encaps_content){
            $session = new session();
            $bdd = data::getInstance();
            $user = new auth();

             //get user
             $iduse=$session->get_data('id_user');
             if(isset($iduse)) {
                 // Recuperation des informations depuis la BDD
                 $sql = "SELECT * FROM t_user WHERE id=".$iduse;
                 $rs = $bdd->getData($sql);
                 $data = $rs[0];
                 
             } else {
                 $id_user = 0;
                 $data = array();
                 $data['nom'] = '';
                 $data['prenom'] = '';
                 $data['login'] = '';
             }

            $this->header = '<body>';

            if($encaps_content)
                $this->header .= '  <div class="header">
                                        <div class="title">
                                            <img src=""/>
                                            Reun\'Eat
                                        </div>';

              /**  menu hamburger**/
        
              $this->header .='         <input id="menu-toggle" type="checkbox" />
                                        <label class="menu-button-container" for="menu-toggle">
                                            <div class="menu-button">
                                            </div>
                                        </label>';
              $this->header .='         <ul class="menu">';
              $this->header .='             <li><div id="connexion">';
              $u="";
              if($user->isAuth()){
                $this->header .= '                <a href="index.php?to=user">';
                $this->header .= '                '.$user["loggin"];
                $this->header .= '                </a>';
                $u=1;
              }else{
                $this->header .= '      <a href="#" id="btn_loggin">';
                $this->header .= '      Loggin';
                $this->header .= '      </a>';
                $u='0';
            }
              $this->header .='             </div></li>';
              $this->header .='             <li>recherche</li>
                                        </ul>
                                    </div>';
              $this->header .= '<div id="zone_connexion" class="zone_connexion">';
              $this->header .= '    <div class="mef_con">';
              $this->header .= '        <div class="zne_con">';
              $this->header .= '            <form action="index.php" method="POST" enctype="multipart/form-data" id="myForm" name="myForm">';
              $this->header .= '                loggin:</br>';
              $this->header .= '                <input type="text" name="loggin" id="loggin"></br></br>';
              $this->header .= '                Mot de passe:</br>';
              $this->header .= '                <input type="password" name"mdp" id="mdp"></br></br>';
              $this->header .= '                <input type="submit" value="Connexion">';
              $this->header .= '        </div>';
              $this->header .= '    </div>';
              $this->header .= '</div>';
        }

        private function build_footer($encaps_content){



            // Fermeture de la balise du conetnu de la page...
            if($encaps_content) {
                $this->footer = '   </div>';
             }
            $this->footer .= '</body>';
        }

        public function build_content($html=''){
            $this->corps = $html;
        }

        public function show(){
            echo $this->header;
            echo $this->corps;
            echo $this->footer;
        }

    }
?>