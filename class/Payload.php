<?php
class Payload
{
	public function GetPayload($id)
	{
		return $GLOBALS['DB']->GetContent("payload", ["ServerID" => $id])[0];
	}
	
		// Créer un payload
	public function CreatePayload($serverid, $content, $description)
	{
		$GLOBALS['DB']->Insert("payload", ["ServerID" => $serverid, "content" => $content, "description" => $description]);
	}
	
	public function DeletePayload($id)
	{
		$name = Payload::GetPayload($id)['description'];
		return $GLOBALS['DB']->Delete("payload", ["description" => $id]);
	}
}
?>