<?php

namespace repair\pand\commands;

use pocketmine\plugin\Plugin;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use repair\pand\Main;

class RepairCommand extends command {

	private $plugin;
	
	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
		parent::__construct($this->plugin->getConfig()->get("command"), $this->plugin->getConfig()->get("description"), "/repair", [""]);
	}
	
	public function execute(CommandSender $s, string $label, array $args) {
		if(!$s instanceof Player) {
			$s->sendMessage("§cUse this command In-Game!");
			return true;
		}
		if(!$s->hasPermission("repairtheitem.command")) {
			$s->sendMessage($this->plugin->getConfig()->get("no-permission"));
			return true;
		}
		$item = $s->getInventory()->getItemInHand();
		$item->setDamage(0);
		$s->getInventory()->setItemInHand($item);
		$s->sendMessage($this->plugin->getConfig()->get("repair-message"));
	}
}