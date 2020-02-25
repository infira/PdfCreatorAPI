<?php

namespace Infira;
class PDFCreatorAPI
{
	private $serverURL;
	
	public function __construct($server, $apiKey)
	{
		$server = trim($server);
		$i      = strlen($server) - 1;
		if ($server{$i} == "/")
		{
			$server = substr($server, 0, -1);
		}
		$this->serverURL = $server . '/' . $apiKey;
	}
	
	public function convertHTML($html)
	{
		return $this->makeRequest("convert/string", ["content" => $html]);
	}
	
	public function convertHTMLPages($pages)
	{
		return $this->makeRequest("convert/string", ["pages" => $pages]);
	}
	
	private function makeRequest($endpoint, $data)
	{
		return $this->call($this->serverURL . "/" . $endpoint, $data);
	}
	
	private function call($url, $data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ["payload" => json_encode($data)]);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
		curl_getinfo($ch);
		try
		{
			$r = curl_exec($ch);
			if ($r === FALSE)
			{
				echo curl_error($ch);;
			}
			
			return $r;
		}
		catch (Exception $exception)
		{
			return $exception->getMessage();
		}
	}
}