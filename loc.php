<?php

function get_ip(){
    if(isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return (isset($_SERVER['REMOTE_ADDR']));
    }
}
$ip=get_ip();

$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'SUCCESS'){
    echo "city:".$query['country']."<br>";
    echo "city:".$query['country']."<br>";
}

?>