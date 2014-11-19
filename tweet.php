<?php

class Twitter{
	
	function toTweet($postMsg){
	require_once dirname(__FILE__) . '/twitteroauth.php';
    $ck = "";
    $cs = "";
    $at = "";
    $ats = "";
    
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
