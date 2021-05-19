<?php

/*
*	TimeCMDs - By Milchreisfan
*	GitHub: https://github.com/Milchreisfan/
*/

declare(strict_types=1);

namespace Milchreisfan\TimeCMDs;

use Milchreisfan\TimeCMDs\commands\dayCommand;
use Milchreisfan\TimeCMDs\commands\midnightCommand;
use Milchreisfan\TimeCMDs\commands\nightCommand;
use Milchreisfan\TimeCMDs\commands\noonCommand;
use Milchreisfan\TimeCMDs\commands\sunriseCommand;
use Milchreisfan\TimeCMDs\commands\sunsetCommand;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\DefaultPermissions;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;

use function PHPSTORM_META\map;

class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getServer()->getCommandMap()->registerAll("timecmds", [
            new dayCommand(),
            new midnightCommand(),
            new nightCommand(),
            new noonCommand(),
            new sunriseCommand(),
            new sunsetCommand()
        ]);
        $this->getLogger()->info("TimeCMDs ist aufgewacht! - By Milchreisfan");
    }
    public function onDisable()
    {
        $this->getScheduler()->cancelAllTasks();
        $this->getLogger()->error("TimeCMDs ist eingeschlafen! - Error - Kontaktiere Milchreisfan bei GitHub!");
    }

    public function registerPermission(): void
    {
        DefaultPermissions::registerPermission(new Permission("day.cmd"));
        DefaultPermissions::registerPermission(new Permission("midnight.cmd"));
        DefaultPermissions::registerPermission(new Permission("noon.cmd"));
        DefaultPermissions::registerPermission(new Permission("sunrise.cmd"));
        DefaultPermissions::registerPermission(new Permission("sunset.cmd"));
    }
}