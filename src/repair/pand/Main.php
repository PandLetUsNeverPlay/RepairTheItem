<?php

namespace repair\pand;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\Server;
use repair\pand\commands\RepairCommand;

class Main extends PluginBase {

	public function onEnable() : void {
		@mkdir($this->getDataFolder());
		$this->saveResource("config.yml");
		$this->saveDefaultConfig();
		$this->getServer()->getCommandMap()->register($this->getConfig()->get("command"), new RepairCommand($this));
		$this->getLogger()->info(TextFormat::GREEN . "RepairTheItem was enabled!");
	}
	
	public function onDisable() : void {
		$this->getLogger()->info(TextFormat::RED . "RepairTheItem was disabled!");
	}
}
