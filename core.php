<?php

include_once('tweet.php');
$tw = new Twitter();
$shell = shell_exec('sensors > /home/luis/lm_sensors_Twitter/temp.txt');
$file = file_get_contents('/home/luis/temp.txt');

//置換的なところ
$new_str = mb_ereg_replace('[^0-9]','.', $file);
$search = array('0000', '105.0', '124.0', '.5....................................0......0....', 
				'.................................1......0....', '.................................2......0....',
				'.................................3......0....', '......................................................................0.........',
				'......................................................................0.........',
				'.............84.0............100.0.........1.........', '.............84.0............100.0.........2.........',
				'.............84.0............100.0.........3.........', '.............84.0............100.0..................0001...........................0.........',
				'.............84.0............100.0.........1.........', '.............84.0............100.0.........2.........',
				'.............84.0............100.0.........3.........', '.............84.0............100.0.....');
$new_str1 = str_replace($search, '', $new_str);

//分割
$array = str_split($new_str1, 4);

$postMsg_Mem = "@lu_iskun\n".
			"Mem1 : ".$array[0]."℃\n".
			"Mem2 : ".$array[1]."℃\n".
			"Mem3 : ".$array[2]."℃\n".
			"Mem4 : ".$array[3]."℃\n";

$tw -> toTweet($postMsg_Mem);

$postMsg_Cpu = "@lu_iskun\n".
				"CPU1 : ".$array[4]."℃\n".
				"CPU2 : ".$array[5]."℃\n".
				"CPU3 : ".$array[6]."℃\n".
				"CPU4 : ".$array[7]."℃\n".
				"CPU5 : ".$array[8]."℃\n".
				"CPU6 : ".$array[9]."℃\n".
				"CPU7 : ".$array[10]."℃\n".
				"CPU8 : ".$array[11]."℃\n";

$tw -> toTweet($postMsg_Cpu);
