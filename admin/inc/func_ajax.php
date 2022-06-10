<?php

	function to_ajax_dbug($dbug='', $clear=FALSE){
		if(is_array($dbug)){
			$html='';
			foreach($dbug as $key=>&$val) $html.=$key.'=>'.$val.'<br/>';
			$dbug=$html;

		}
		if(empty($dbug)) 'Nothing here....';//$dbug=mktime().dbug($_POST, TRUE);
		if($clear) to_ajax('dbug_clean','','');
		to_ajax('dbug','', $dbug);
	}

	function to_ajax($action, $id='void', $data=''){
		$action=strtolower($action);
		switch($action){
			case 'alert':
			case 'dbug':
			case 'dbug_clean':
			case 'append':
			case 'after':
			case 'prepend':
			case 'set':
			case 'focus':
			case 'select':
			case 'class':
			case 'altsrc':
			case 'hide':
			case 'show':
			case 'wait':
			case 'endwait':
			case 'remove':
			case 'modal':
			case 'html':
			case 'location':
				echo $id.'<xfill type="'.$action.'">'.$data.'</xfill>';
			break;
			
		}
	}

	function to_ajax_eval($js){
		echo 'void<xfill type="eval">'.$js.'</xfill>';
	}

	function to_ajax_location($url=''){
			echo 'void<xfill type="location">'.$url.'</xfill>';	
	}

?>