<?php

namespace saisana299;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{
	
    private $commandLogger;

    public function onEnable(){
    	@mkdir($this->getDataFolder());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

     public function onServerCommand(CommandEvent $event){
        $command = $event->getCommand();
        $this->commandLogger = new CommandLogger($this->getDataFolder() . "Command".date("Y-m-d").".log");
        $this->commandLogger->log("[".$event->getSender()->getName()."] /".$command."");

    }
 }
