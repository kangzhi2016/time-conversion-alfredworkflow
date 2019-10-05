<?php

require_once('workflows.php');

class Time{
	
	function __construct() {
		date_default_timezone_set('PRC');
		$this->workflows = new Workflows();
	}

	public function getTime($string){
		if(empty($string)){
		    $title = $this->getMsecTime();
		    $sub_title = $this->getMsecToMescdate($title);

		    $this->workflows->result(1, $title, $title, $sub_title, 'icon.png');
		    $this->workflows->result(2, $sub_title, $sub_title, $title, 'icon.png');
		}else{
		    $str = strstr($string, '-');

		    if($str === false){
		    	$title = $this->getMsecToMescdate($string);
		    }else{
		    	$title = $this->getDateToMesc($string);
		    }

			$this->workflows->result(1, $title, $title, $string, 'icon.png'); 
		}

		echo $this->workflows->toxml();
	}

	/**
     * 获取毫秒级别的时间戳
     */
    public function getMsecTime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }
 
    /**
     * 毫秒转日期
     */
    public function getMsecToMescdate($msectime)
    {
        $msectime = $msectime * 0.001;
        if(strstr($msectime,'.')){
            sprintf("%01.3f",$msectime);
            list($usec, $sec) = explode(".",$msectime);
            $sec = str_pad($sec,3,"0",STR_PAD_RIGHT);
        }else{
            $usec = $msectime;
            $sec = "000";
        }
        $date = date("Y-m-d H:i:s.x",$usec);
        return $mescdate = str_replace('x', $sec, $date);
    }
 
    /**
     * 日期转毫秒
     */
    public function getDateToMesc($mescdate)
    {
        list($usec, $sec) = explode(".", $mescdate);
        $date = strtotime($usec);
        $return_data = str_pad($date.$sec,13,"0",STR_PAD_RIGHT);
        return $msectime = $return_data;
    }
}






