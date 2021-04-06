<?php

/*
*	FeedAndHeal - By Milchreisfan
*	GitHub: https://github.com/Milchreisfan/
*/

declare(strict_types=1);

namespace Milchreisfan\FeedAndHeal;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getLogger()->info("FeedAndHeal ist aufgewacht! - By Milchreisfan");
    }
    public function onDisable(){
        $this->getLogger()->error("FeedAndHeal ist eingeschlafen! - Error - Kontaktiere Milchreisfan bei GitHub!");
    }
    public $fts;

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {

        $fts = "[CMD]";
        $this->fts = $fts;

        if($cmd->getName() == "feed") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("feed.cmd")) {
                    $sender->setFood(20);
                    $sender->sendMessage("§l§o§bFeed §3>§r §fDeine Hungerleiste wurde aufgefüllt!");
                } else {
                    $sender->sendMessage("§l§o§bFeed §3>§r §cDu hast keine Rechte für diesen Befehl!");
                    return true;
                }
            }
            return true;
        }
        if($cmd->getName() == "heal") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("heal.cmd")) {
                    $sender->setHealth(20);
                    $sender->sendMessage("§l§o§bHeal §3>§r §fDeine Herzensleiste wurde aufgefüllt!");
                } else {
                    $sender->sendMessage("§l§o§bHeal §3>§r §cDu hast keine Rechte für diesen Befehl!");
                    return true;
                }
            }
            return true;
        }
    }
}