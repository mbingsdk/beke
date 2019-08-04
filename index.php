<?php
require_once('./line_class.php');
$channelAccessToken = 'fwmfJmMEMQkQ9cQvrOR3CXpDXQPSQ7EJ/dLHIarxWAM6V1v/LR4wC3bLjHpLotVNRl07c9R93u6bV5RSTBbw7zCyIe8baMBZZESek9mUN1wAZAgd7bEQSPAACsRnv8uYjyPHk9jn/HzWhPJq//xOWgdB04t89/1O/w1cDnyilFU='; //Channel access token
$channelSecret = '05f69501ac4edc88dfbd05bcc1f50ee2';//Channel secret

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$replyToken = $client->parseEvents()[0]['replyToken'];
$message 	= $client->parseEvents()[0]['message'];
$msg_type = $message['type'];
$botname = "Kambing Jones"; //Nama bot

function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}

function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Apakah ente gvlk :v',
		'Bisa jadi',
		'Mungkin',
		'Aku lagi galau, aku mencintai dia yang masih miliknya :v',
		'Nanya mulu si begok :v',
		'Aku mencintaimu, kapan udahan sama dia?',
	    	'Bacot',
		'Kambing udah kayak artis, di kepoin mulu :v',
		'Mau dong jalan jalan ke group kakak',
	    	'Nanya apaan',
	    	'Tanyakan Sama Rumput Yang Berjoged aduh aduh Syantik Unch',
	    	'Brisik',
	    	'Eeq Lu',
	    	'Kambing sayang sama kakak',
	    	'Idihh Kepo',
		'Apakah kakak gk nanyain soal dia?',
		'Kambing males jawab',
		'Nanya Sama Kambing kak?',
		'Kambing nanya balik dulu, kakak mau temenan sama kambing gk?',
		'Nanya mulu, Add Kambing dong',
		'Tentu tidak',
		'Coba tanya lagi'
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} else {}

if(isset($balas)){
    $client->replyMessage($balas); 
    $result =  json_encode($balas);
    file_put_contents($botname.'.json',$result);
}
