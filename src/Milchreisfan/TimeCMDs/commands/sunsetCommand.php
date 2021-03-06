<?php

namespace Milchreisfan\TimeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class sunsetCommand extends Command
{

    public function __construct()
    {
        parent::__construct("sunset", "Ändere die Zeit zu Sonnenuntergang!");
    }


    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            $player = $sender->getPlayer();
            if (!$player->hasPermission("sunset.cmd")) {
                $player->sendMessage("§8[§bTime§8] §3» §4Du hast keine Berechtigung für diesen Befehl!");
                return;
            }
            $player->getLevel()->setTime(12000);
            foreach (Server::getInstance()->getOnlinePlayers() as $p) {
                $p->sendMessage("§8[§bTime§8] §3» §fDie Zeit wurde zu Sonnenuntergang geändert!");
            }
            return;
        }
        $sender->sendMessage(TextFormat::RED . "Diesen Befehl kannst du nur Ingame ausführen.");
    }
}
