<?php
function query($query){
    if(!empty($query)){
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        if(!$result){
            return FALSE;
        }
        return $result;
    }
}

function sql_simple_delete($table,$id,$transaction_mode=FALSE,$debug=FALSE){
    $sql="DELETE FROM ".$table." WHERE id='".$id."' LIMIT 1;";
    if($transaction_mode)
        return $sql;
    else
        return query($sql,$debug);
}

function sql_simple_insert($table,$r,$transaction_mode=FALSE,$debug=FALSE){
    foreach($r as $key => $val){
        $insert[]='`'.$key.'`';
        $value[]="'".addslashes($val)."'";
    }
    $sql="INSERT INTO ".$table." (".implode(', ',$insert).") VALUES (".implode(', ',$value).");";
    if($transaction_mode){
        return $sql;
    }else{
        query($sql,$debug);
        return @((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
    }
}

function sql_simple_replace($table,$r,$transaction_mode=FALSE,$debug=FALSE){
    foreach($r as $key => $val){
        $insert[]='`'.$key.'`';
        $value[]="'".addslashes($val)."'";
    }
    $sql="REPLACE INTO ".$table." (".implode(', ',$insert).") VALUES (".implode(', ',$value).");";
    if($transaction_mode){
        return $sql;
    }
    else{
        query($sql,$debug);
        return @((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
    }
}

function sql_simple_update($table,$id,$r,$transaction_mode=FALSE,$debug=FALSE,$id_name='id'){
    foreach($r as $key => $value)$tmp_set[]=$key."='".addslashes($value)."'";

    $sql="UPDATE ".$table." SET ".implode(', ',$tmp_set)." WHERE $id_name='".$id."' LIMIT 1;";
    //echo "\n".$sql."\n";
    if($transaction_mode)
        return $sql;
    else
        return query($sql,$debug);
}

function squery($sql,$debug=FALSE,$link=false){
    if($link)
        $result=query_link($sql,$link);
    else
        $result=query($sql,$debug, false,$link);
    if(@mysqli_num_rows($result)==1){
        $r=@mysqli_fetch_row($result);
        return $r[0];
    }
    if(@mysqli_num_rows($result)>1){
        $r=array();
        while($row=@mysqli_fetch_row($result)) $r[]=$row[0];
        return $r;
    }
    return FALSE;
}

?>

