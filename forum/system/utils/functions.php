<?php 
function escape($t, $i = false){
	global $mysqli;
	if($i === true){
		return intval($t);
	}
	else {
		return $mysqli->real_escape_string(trim(htmlspecialchars($t, ENT_QUOTES)));
	}
}

function waliCode($code, $custom = array()){
	$def = array('code'=> $code);
	$res = array_merge($def, $custom);
	return json_encode( $res, JSON_UNESCAPED_UNICODE);
}

?>