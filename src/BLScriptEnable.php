<?php
// CC-zero license: do whatever the duck you want
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\Network;
use pocketmine\network\protocol\TextPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
class BLScriptEnable extends PluginBase implements Listener {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	/**
	 * @param PlayerJoinEvent $event
	 *
	 * @priority MONITOR
	 */
	public function onPlayerJoin(PlayerJoinEvent $event){
		$pk = new TextPacket();
		$pk->type = TextPacket::TYPE_CHAT;
		$pk->source = "";
		$pk->message = TextFormat::BLACK . "BlockLauncher, enable scripts";
		$event->getPlayer()->dataPacket($pk->setChannel(Network::CHANNEL_TEXT));
	}
}
