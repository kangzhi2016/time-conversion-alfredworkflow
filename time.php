<?php

require_once('workflows.php');

class Time{

	public function getTime($string){
		if(empty($string)){
		    $title = time();
		    $sub_title = date('Y-m-d H:i:s', time());

		    set_result(1, $title, $title, $sub_title, 'icon.png');
		    set_result(2, $sub_title, $sub_title, $title, 'icon.png');
		}else{
		    if(is_numeric($string)){
		    	$title = date('Y-m-d H:i:s', $string);
		    }else{
		    	$title = strtotime($string);
		    }

			set_result(1, $title, $title, $string, 'icon.png');
		}

		echo_result();
	}
}






