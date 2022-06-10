<?php
    function manage_background(){
        // Affichage aléatoire du fond de page
        $i = 0;
        $images = array();
        $folder = opendir('images/upload/big/');

        while(false !=($file = readdir($folder))){
            if($file != "." && $file != ".."){
                $images[$i]= $file;
                $i++;
            }
        }

        $random_img=rand(0,count($images)-1);
        if(is_file('images/upload/big/'.$images[$random_img]))
            return "   body{background-image:url(images/upload/big/".$images[$random_img].");}";

    }

    function dbug($var='',$return=FALSE){

        if(is_object($var)){
            echo '<pre style="color:#FF0000">';
            var_dump($var);
            echo '</pre>';
            return '';
        }
        if(is_array($var)){
            // print_r no screen flush
            ob_start();
            echo '<pre>';print_r($var);echo '</pre>';
            $dbug=ob_get_contents();
            ob_end_clean();

            $dbug='<div class="debug">[debug:]'.$dbug.'&nbsp;</div>';
            if($return){

                return $dbug;
            }else{
                echo $dbug;
            }
        }else if($var===false){
            echo '<div class="debug">[debug:]FALSE&nbsp;</div>';

        }else{
            $dbug='<div class="debug">[debug:]'.$var.'&nbsp;</div>';
            if($return){
                return $dbug;
            }else{
                echo $dbug;
            }
        }
    }

    if (!function_exists('array_key_first')) {
        function array_key_first(array $arr) {
            foreach($arr as $key => $unused) {
                return $key;
            }
            return NULL;
        }
    }
?>