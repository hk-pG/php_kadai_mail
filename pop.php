<?php

//設定
$a = array(
  'host' => 'alumni.hamako-ths.ed.jp',
  'user' => 'ei2030',
  'pass' => 'ei2030@alumni.hamako-ths.ed.jp',
);

if ($a['user'] == 'ei20xx' || $a['pass'] == 'ei20xx@alumni.hamako-ths.ed.jp') {
    echo "コードのei20xxのところを自分の番号に変えてください<br />";
}

//110番ポートで接続する
$fp = fsockopen('tcp://' . $a['host'] . ':110', 110, $err, $errno, 10);


//認証
$r = fgets($fp, 1024);  //+OK
fputs($fp, 'USER ' . $a['user'] . "\r\n");
$r = fgets($fp, 1024);  //+OK
fputs($fp, 'PASS ' . $a['pass'] . "\r\n");
$r = fgets($fp, 1024);  //+OK or +ERR

//STAT 何件あるの？
fputs($fp, "STAT\r\n");
$r = fgets($fp, 1024);
sscanf($r, '+OK %d %d', $num, $size);
//結果表示
// var_dump($num, $size);

//メールデータ取得（件数分 RETR）
$data = array();
for ($i = 1; $i <= $num; ++$i) {
    //RETR n -n番目のメッセージ取得（ヘッダ含）
    fputs($fp, 'RETR ' . $i . "\r\n");
    //+OK
    $r = fgets($fp, 512);
    //EOFの.まで読む
    $d = null;
    do {
        $line = fgets($fp, 512);
        $d .= $line;
        print $line . "<br />";
    } while (!mb_ereg("^\.\r\n", $line));
    $data[$i] = $d;

    //DELE n n番目のメッセージ削除（読んだら削除したいとき）
    //fputs($fp, 'DELE ' . $i . "\r\n");
    //fread($fp,1024);
}
//結果表示
// var_dump($data);

//さようなら
fputs($fp, "QUIT\r\n");
fgets($fp, 1024);
