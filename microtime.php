<?php

require_once('workflows.php');

class Time{

	public function getTime($string){
		if(empty($string)){
		    $title = $this->getMsecTime();
		    $sub_title = $this->getMsecToMescdate($title);

		    set_result(1, $title, $title, $sub_title, 'icon.png');
		    set_result(2, $sub_title, $sub_title, $title, 'icon.png');
		}else{
		    if(is_numeric($string) && strlen($string) == 13){
		    	$title = $this->getMsecToMescdate($string);
		    }else{
		    	$title = $this->getDateToMesc($string);
		    }

			set_result(1, $title, $title, $string, 'icon.png');
		}

		echo_result();
	}

	/**
     * 获取毫秒级别的时间戳
     */
    public function getMsecTime()
    {
        list($msec, $sec) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }
 
    /**
     * 毫秒转日期
     */
    public function getMsecToMescdate($msectime)
    {
        $msectime = $msectime * 0.001;
        if(strstr($msectime,'.')){
            list($usec, $sec) = explode(".",$msectime);
            $sec = str_pad($sec,3,"0",STR_PAD_RIGHT);
        }else{
            $usec = $msectime;
            $sec = "000";
        }
        $date = date("Y-m-d H:i:s.x",$usec);
        return str_replace('x', $sec, $date);
    }
 
    /**
     * 日期转毫秒
     */
    public function getDateToMesc($mescdate)
    {
        list($usec, $sec) = explode(".", $mescdate);
        $date = strtotime($usec);
        return str_pad($date.$sec,13,"0",STR_PAD_RIGHT);
    }
}






