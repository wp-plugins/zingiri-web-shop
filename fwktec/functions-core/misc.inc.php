<?php
function fwktecSendEmail($from,$to,$subject,$message,$charset) {
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset='.$charset."\r\n";
	$headers .= 'From: '.$from.' <'.$from.'>' . "\r\n";
	mail($to, $subject, $message, $headers);
	return true;
}