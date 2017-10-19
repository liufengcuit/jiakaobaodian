<?php
header('Access-Control-Allow-Origin:*');

$type = $_GET['type'];

$json_string = file_get_contents('mock/user.json');
$data = json_decode($json_string);

if($type=='login'){
	$username = $_GET['username'];
	$userpwd = $_GET['userpwd'];
	foreach ($data as $key=>$value) {
	# code...
		if($username==$value->username && $userpwd==$value->pwd){
			echo true;
		}else{
			echo false;
		}
	}
}elseif($type=='register'){
	$username = $_GET['username'];
	$userpwd = $_GET['userpwd'];
	$obj = new stdClass;
	$obj->username=$username;
	$obj->userpwd=$userpwd;

	$res = file_put_contents('mock/user.json', json_encode($obj));

	if($res){
		echo true;
	}
}elseif($type=='car'){
	$joke_string = file_get_contents('http://v.juhe.cn/jztk/query?subject=1&model=c1&key=d8f280a6bf2c3c9f7d215b3701d75831&testType=rand',true);
	echo $joke_string;
}


exit;

?>