<?php
namespace pwb;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\generator\normal\biome\PlainBiome;
use pocketmine\Player;
class main extends PluginBase {
	public function onEnable(){
		$this->getLogger()->info("loaded!");
	}
	
	public function onCommand(CommandSender $sender,Command $command, $label,array $args){
		switch ($command->getName()){
			case "pwb":
				if ($sender->hasPermission("pwb.use")){
				if (isset($args[0]) and isset($args[1])){
					$players = $this->getServer()->getLevelByName($args[0])->getPlayers();
					unset($args[0]);
					$message = implode(" ", $args);
					if (!$players == null){
						foreach ($players as $player){
							$player->sendMessage($message);
						}
					}
					
				}else{
					$sender->sendMessage("Usage: /pwb [world] [message]");
				}}else{
					$sender->sendMessage("No permission to use this command!");
				}
			break;
			
		}
	}
	
}