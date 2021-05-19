<?php

namespace Milchreisfan\TimeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class dayCommand extends Command
{

    public function __construct()
    {
        parent::__construct("day", "Ändere die Zeit zu Tag!");
    }


    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            $player = $sender->getPlayer();
            if (!$player->hasPermission("day.cmd")) {
                $player->sendMessage("§8[§bTime§8] §3» §4Du hast keine Rechte für diesen Befehl!");
                return;
            }
            $player->getLevel()->setTime(1000);
            foreach (Server::getInstance()->getOnlinePlayers() as $p) {
                $p->sendMessage("§8[§bTime§8] §3» §fDie Zeit wurde zu Tag geändert!");
            }
            return;
        }
        $sender->sendMessage(TextFormat::RED . "Diesen Befehl kannst du nur Ingame ausführen.");
    }
}
