<?php
class Server
{
	// Vérifie si un serveur existe et retourne sont id
	public function GetServerByIP($ip)
	{
		if($GLOBALS['DB']->Count("servers", ["IPAddress" => $ip]) == 1)
		{
			$server_id = $GLOBALS['DB']->GetContent("servers", ["IPAddress" => $ip])[0]["ServerID"];
			return $server_id;
		}
		else
		{
			return false;
		}
	}

	// Récupére le server
	public function GetServer($server_id)
	{
		return $GLOBALS['DB']->GetContent("servers", ["ServerID" => $server_id])[0];
	}

	// Ajoute un serveur
	public function AddServer($name, $ip, $users)
	{
		$GLOBALS['DB']->Insert("servers", ["HostName" => $name, "IPAddress" => $ip, "Players" => $users, "LastUpdate" => time()]);
	}

	// Mets à jour un serveur
	public function UpdateServer($server_id, $name, $ip, $users)
	{
		$GLOBALS['DB']->Update("servers", ["id" => $server_id], ["HostName" => $name, "Players" => $users, "LastUpdate" => time()]);
	}

	// Récupére tous les serveur
	public function GetAllServer()
	{
		return $GLOBALS['DB']->GetContent("servers");
	}
}
?>