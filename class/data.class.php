<?php
/**
 * Class data
 *
 * Permet de gérer l'accès à la BDD
 *
 * Auteur  : Christophe THIBAULT
 * Date    : 30/03/2022
 * Version : 1.0
 */
class data {
    private static $_instance = null;
    private $link = null;
    private $DATABASE = 'reun_eat';     //
    private $SERVEUR = 'localhost: 3307';          // 127.0.0.1
    private $USER = 'root';                     //
    private $PASS = '';                     //
    private $die_message_serveur = 'Erreur Serveur';
    private $die_message_bdd = 'Erreur BDD';
    private $data = null;

    private function __construct(){
        // Connexion Serveur
        $this->link = mysqli_connect($this->SERVEUR,  $this->USER,  $this->PASS) or die($this->die_message_serveur);

        // Connexion BDD
        mysqli_select_db($this->link, $this->DATABASE) or die($this->die_message_bdd);

        // Gestion Encodage
        $sql="SET CHARACTER SET 'utf8mb4';";
        mysqli_query($this->link, $sql);
        $sql="SET collation_connection = 'utf8mb4_general_ci';";
        mysqli_query($this->link, $sql);
    }

    // Singleton
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new data();
        }
        return self::$_instance;
    }

    public function getData($query){
        if(!empty($query)){
            $result = mysqli_query($this->link, $query);
            if(!$result || !mysqli_num_rows($result)){
                return FALSE;
            } else {
                $r = array();
                while ($row = @mysqli_fetch_assoc($result)) $r[] = $row;
                return $r;
            }
        }
    }

    public function query($query){
        if(!empty($query)){
            $result = mysqli_query($this->link, $query);
            if(!$result){
                return FALSE;
            }
            return $result;
        }
    }

    public function simple_delete($table,$id,$transaction_mode=FALSE){
        $sql="DELETE FROM ".$table." WHERE id='".$id."' LIMIT 1;";
        if($transaction_mode)
            return $sql;
        else
            return $this->query($sql);
    }

    public function simple_insert($table,$r,$transaction_mode=FALSE){
        foreach($r as $key => $val){
            $insert[]='`'.$key.'`';
            $value[]="'".addslashes($val)."'";
        }
        $sql="INSERT INTO ".$table." (".implode(', ',$insert).") VALUES (".implode(', ',$value).");";
        if($transaction_mode){
            return $sql;
        }else{
            $this->query($sql);
            return @((is_null($___mysqli_res = mysqli_insert_id($this->link))) ? false : $___mysqli_res);
        }
    }

    public function simple_replace($table,$r,$transaction_mode=FALSE){
        foreach($r as $key => $val){
            $insert[]='`'.$key.'`';
            $value[]="'".addslashes($val)."'";
        }
        $sql="REPLACE INTO ".$table." (".implode(', ',$insert).") VALUES (".implode(', ',$value).");";
        if($transaction_mode){
            return $sql;
        }
        else{
            $this->query($sql,$debug);
            return @((is_null($___mysqli_res = mysqli_insert_id($this->link))) ? false : $___mysqli_res);
        }
    }

    public function simple_update($table,$id,$r,$transaction_mode=FALSE,$id_name='id'){
        foreach($r as $key => $value)$tmp_set[]=$key."='".addslashes($value)."'";

        $sql="UPDATE ".$table." SET ".implode(', ',$tmp_set)." WHERE $id_name='".$id."' LIMIT 1;";
        //echo "\n".$sql."\n";
        if($transaction_mode)
            return $sql;
        else
            return $this->query($sql);
    }

    public function squery($sql){
        $result=$this->query($sql);
        if(@mysqli_num_rows($result)==1){
            $r=@mysqli_fetch_row($result);
            return $r[0];
        }
        if(@mysqli_num_rows($result)>1){
            $r=array();
            while($row=@mysqli_fetch_assoc($result)) $r[]=$row;
            return $r;
        }
        return FALSE;
    }

    public function gotResult($rs){
        return mysqli_num_rows($rs);
    }
}