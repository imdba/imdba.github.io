<?php

	
	//二维数组去重
	function unique_arr($array2D,$stkeep=false,$ndformat=true){
		if($stkeep) $stArr = array_keys($array2D);
		if($ndformat) $ndArr = array_keys(end($array2D));
		foreach ($array2D as $v){
			$v = join(",",$v);
			$temp[] = $v;
		}
		$temp = array_unique($temp); 
		foreach ($temp as $k => $v){
			if($stkeep) $k = $stArr[$k];
			if($ndformat){
				$tempArr = explode(",",$v); 
				foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;
			}
			else $output[$k] = explode(",",$v); 
		}
		return $output;
	}
?>