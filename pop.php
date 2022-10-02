<?php

function div($msg)
{
	echo "<div>$msg</div>";
}

$sock = fsockopen("alumni.hamako-ths.ed.jp", 110, $err, $errno, 10) or die("CANNOTCONNECT");

$buf = fgets($sock, 512);

if (substr($buf, 0, 3) != '+OK') {
	die($buf);
}

div("before auth");
$buf = _sendcmd("USER ei2030");
$buf = _sendcmd("PASS hukada114514");
div("after auth");

$data = _sendcmd("STAT");

sscanf($data, '+OK %d %d', $num, $size);

if ($num == "0") {
	$buf = _sendcmd("QUIT");
	fclose($sock);
	exit();
}

for ($i = 1; $i <= $num; $i++) {
	echo $i;
	$line = _sendcmd("RETR $i");
	while ($line != ".\r\n") {
		$line = fgets($sock, 512);
		print $line . "<br>";
	}
	$data = _sendcmd("DELE $i");
}

$buf = _sendcmd("QUIT");


fclose($sock);

function _sendcmd($cmd)
{
	global $sock;
	fputs($sock, $cmd, "\r\n");
	$buf = fgets($sock, 512);
	if (substr($buf, 0, 3) == '+OK') {
		return $buf;
	} else {
		die($buf);
	}

	return false;
}
