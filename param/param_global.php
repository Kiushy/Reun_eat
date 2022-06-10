<?php
    define('USERSESSION', 'Web_Dev_Qualif_FO');
    define('SITE_NAME','Formation_Web_Dev_Qualif_FO');

    $pathInfo = pathinfo($_SERVER['PHP_SELF']);
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
    $hostName = $_SERVER['HTTP_HOST'];
    define('URL_SITE',$protocol.'://'.$hostName.$pathInfo['dirname']."/");

?>