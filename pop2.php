<?php

function div($msg)
{
    echo "<div>$msg</div>";
}
$host = 'alumni.hamako-ths.ed.jp';
$user = 'ei2030';
$pass = 'ei2030@alumni.hamako-ths.ed.jp';

$sock = fsockopen('tcp://' . $host . ':110', 110, $err, $err_msg, 10);


// if (substr($buf, 0, 3) != '+OK') {
// die($buf);
// }

// authentication
$buf = fgets($sock, 1024);
// $buf = _sendcmd("USER ei2030");
// $buf = _sendcmd("PASS ei2030@alumni.hamako-ths.ed.jp");
fputs($sock, 'USER' . $user . "\r\n");
$buff = fgets($sock, 1024);
fputs($sock, 'PASS'. $pass. "\r\n");
$buff = fgets($sock, 1024);

// Start Process
// $data = _sendcmd("STAT");
fputs($sock, "STAT\r\n");
$buff = fgets($sock, 1024);

// sscanf($data, '+OK %d %d', $num, $size);
sscanf($buff, '+OK %d %d', $num, $size);

// print result
echo "result <br />";
echo "num size <br />";
var_dump($num, $size);

// if ($num == "0") {
// $buf = _sendcmd("QUIT");
// fclose($sock);
// exit();
// }

// get mail data
/*
for ($i = 1; $i <= $num; $i++) {
    echo $i;
    $line = _sendcmd("RETR $i");
    while ($line != ".\r\n") {
        $line = fgets($sock, 512);
        print $line . "<br>";
    }
    $data = _sendcmd("DELE $i");
}
*/
$data = array();
for ($i = 1; $i <= $num; $i++) {
    // get nth message
    fputs($sock, 'RETR ' . $i . "\r\n");
    $buff = fgets($sock, 1024);
    $d = null;
    do {
        $line = fgets($sock, 1024);
        $d .= $line;
    } while (!mb_ereg("^\.\r\n", $line));
    $data[$i] = $d;
}

// print message
echo "<pre>";
foreach ($data as $line) {
    echo $line. "\r\n";
}
echo "</pre>";

// quit
fputs($sock, "QUIT\r\n");
fgets($sock, 1024);
fclose($sock);


// $buf = _sendcmd("QUIT");


// fclose($sock);

/*
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

*/
