<?PHP

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

	
	
	
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     $ip=$_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
     $ip=$_SERVER['REMOTE_ADDR'];
}
	

    return $ip;
}


$ip = getUserIP();

echo $user_ip; // Output IP address [Ex: 177.87.193.134]


?>