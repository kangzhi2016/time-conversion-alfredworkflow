<?php

require_once('workflows.php');

class Time{
	
	function __construct() {
		date_default_timezone_set('PRC');
		$this->workflows = new Workflows();
	}

	public function getTime($string){
		if(empty($string)){
		    $title = time();
		    $sub_title = date('Y-m-d H:i:s', time());

		    $this->workflows->result(1, $title, $title, $sub_title, 'icon.png');
		    $this->workflows->result(2, $sub_title, $sub_title, $title, 'icon.png');
		}else{
            if(is_numeric($string)){
                $title = date('Y-m-d H:i:s', $string);
            }else{
                $title = strtotime($string);
            }

			$this->workflows->result(1, $title, $title, $string, 'icon.png'); 
		}

		echo $this->workflows->toxml();
	}
}





