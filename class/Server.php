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
		
	public function GetServerPayload($server_id)
	{
		return $GLOBALS['DB']->GetContent("payload", ["ServerID" => $server_id])[0]["execution"];
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
	
		// Appeler un Payload
	public function CallPayload($server_id, $payload_id)
	{
		$ip = Server::GetServer($server_id)['IPAddress'];
		$pname = Payload::GetPayload($payload_id)['payloadID'];
		$GLOBALS['DB']->Update("payload", ["ServerID" => $server_id], ["status" => $payload_id]);
   }

	// Reset un payload pour un serveur
	public function ResetPayload($server_id)
	{
		$ip = Server::GetServer($server_id)['IPAddress'];
		$GLOBALS['DB']->Update("payload", ["ServerID" => $server_id], ["execution" => -1]);
	}

	// Récupéré le statut d'un apelle
	public function CallStatut($server_id)
	{
		if ($GLOBALS['DB']->GetContent("payload", ["ServerID" => $server_id])[0]['status'] == -1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>