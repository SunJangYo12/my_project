<?php
    $user = $_GET['user'];
	$password = $_GET['password'];
	$sret = '';

	if ($user=='a' && $password==8){
		$sret = 'Login Success';
	}
    else{
		$sret = 'Password Salah';
	}
	echo $sret;

?>
