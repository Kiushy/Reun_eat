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
            $my = new session();
            $this->header = '<body>';

            if($encaps_content)
                $this->header .= '   <div class="content">';
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