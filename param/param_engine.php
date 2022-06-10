<?php
// Version Automatique

$folders = glob('mod/*/');
foreach ($folders as $key => $value) {
    $page[basename($value)] = $value. basename($value).'.php';
    if(is_file($value. 'ajax_'.basename($value).'.php'))
        $page['ajax_'.basename($value)] = $value. 'ajax_'.basename($value).'.php';
}

?>