<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$API_KEY = '5492347635:AAH3qc0Nb31XBxmLZOVt7pgpqrp6euTn9OU';//TOKIN
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $yhya = http_build_query($datas);
        $url = "https://api.telegram.org/bot".API_KEY."/".$method."?$yhya";
        $yhyasyrian = file_get_contents($url);
        return json_decode($yhyasyrian);
    }
    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

date_default_timezone_set('Africa/Cairo');
// set IP address and API access key
$access_key =  "877aa0cf53c567f3a54463ea0153ebc8" ;
$ip = getUserIP();
$ch = json_decode(file_get_contents( "http://api.ipapi.com/$ip?access_key=$access_key"));
$code =  $ch->location->calling_code;
$time = date('h:i');
$api = json_decode(file_get_contents("https://ipinfo.io/$ip"));
$year = date('Y');
$month = date('n');
$day = date('j');
$admin = "948449142";
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"
🔱HETLAR PORTIFLIO MAIL🔱
-------------------------------------------
     `$subject`
💎 ! IP  » `$ip`
👤 ! EMAIL  » `$email`
📟 ! message  » `$message`
⏱ ¦ 𝑻𝒊𝒎𝒆 » $time
📝 ! DATE  » $day/$month/$year
-------------------------------------------
⚜ ! BY » @hakimel3alam

",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);   
echo "your message has been sent";