<?php

class Twitter{
	
	function toTweet($postMsg){
	require_once dirname(__FILE__) . '/twitteroauth.php';
    $ck = "t3zosSnCa5NnzFot5hQiNdrKy";
    $cs = "PUs69F28Fcln2EMckoRa2VBHkutRTvL64FRAYLXEreQxXbmdru";
    $at = "231127644-AW96LwRMxnsUvqOukv6f1wLtljryRB2oughbuu8i";
    $ats = "pRE2D5BKuhacyXAbpEL57lVihhrnyb0dtzbjdy7K6MvYD";
    
    //リクエストを投げる先（固定値）
    $url = "https://api.twitter.com/1.1/statuses/update.json";
    $method = "POST";

    //投稿する文言
	$this->postMsg = $postMsg;

    // OAuthオブジェクト生成
    $toa = new TwitterOAuth($ck,$cs,$at,$ats);

    //投稿
	$res = $toa->OAuthRequest($url,$method,array("status"=>"$postMsg"));
    
    echo $postMsg;
	}
}
