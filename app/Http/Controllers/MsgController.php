<?php
/**
 * Created by PhpStorm.
 * User: opower
 * Date: 2016/10/18
 * Time: 9:48
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;

class MsgController
{
	private static $MsgFile = "msg.xml";

	private static $instance = null;

	public static function ins()
	{
		if(MsgController::$instance == null)
		{
			MsgController::$instance = new MsgController();
		}
		return MsgController::$instance;
	}

	private $errMsgMap = array();

	public function getErrMsg($id)
	{
		if(empty($this->errMsgMap))
		{
			$this->loadErrMsg();
		}
		if(array_key_exists($id, $this->errMsgMap))
		{
			return $this->errMsgMap[$id];
		}
	}

	public function loadErrMsg()
	{
		if(!Storage::disk("local")->exists(MsgController::$MsgFile))
		{
			throw new Exception("Cant find message file");
		}
		$content = Storage::get(MsgController::$MsgFile);
		$xp = xml_parser_create();
		xml_parse_into_struct($xp, $content, $vlus, $idxs);
		xml_parser_free($xp);

		if(array_key_exists("ERR", $idxs))
		{
			foreach($idxs["ERR"] as $idx)
			{
				$vlu = $vlus[$idx];
				if(array_key_exists("type", $vlu)
				&& $vlu["type"] == "open")
				{
					$begIdx = $idx;
				} else
				if(array_key_exists("type", $vlu)
				&& $vlu["type"] == "close")
				{
					$endIdx = $idx;
				}
			}
			$this->errMsgMap = [];
			if(!isset($begIdx) || !isset($endIdx))
			{
				throw new Exception("Cant search error messages");
			}
			for($i = $begIdx; $i < $endIdx; ++$i)
			{
				$vlu = $vlus[$i];
				if(array_key_exists("tag", $vlu)
				&& $vlu["tag"] == "MSG")
				{
					if(array_key_exists("attributes", $vlu)
					&& array_key_exists("ID", $vlu["attributes"]))
					{
						$msgId = $vlu["attributes"]["ID"];
					} else
					{
						continue;
					}
					if(array_key_exists("value", $vlu))
					{
						$msgCtt = $vlu["value"];
					} else
					{
						continue;
					}
					$this->errMsgMap[$msgId] = $msgCtt;
				}
			}
			//var_dump($this->errMsgMap);
		}
	}
}