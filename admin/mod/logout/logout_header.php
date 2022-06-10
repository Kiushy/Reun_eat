<?php
    $session = new session();
    $session->unload_session();
    header('Location: index.php');
?>