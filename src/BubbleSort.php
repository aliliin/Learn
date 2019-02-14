<?php

namespace Learn;

// 简单冒泡排序

class BubbleSort
{

	public function BubbleSort($array)
	{
		$len = count($array);
		if ($len > 1) {
			for ($i=0; $i < $len ; $i++) { 
					for ($j= $len-1; $j > $i; $j--) { 
						if ($array[$j] < $array[$j-1]) {
							$temp = $array[$j];
							$array[$j] = $array[$j-1];
						    $array[$j-1]=$temp;
						}
					}
			}
			return $array;
		}else{
			return $array;
		}
		
	}
}
