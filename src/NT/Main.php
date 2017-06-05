<?php

namespace NT;

use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->egtPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args)
    {
        switch ($command->getName()) {
            case "setitemname":
                if ($sender instanceof Player) {
                    if ($args[1] == null) {
                        $sender->sendMessage(TextFormat::RED . "USAAGE: /setitemname <name>");
                    }
                    else
                    {
                        if ($sender->getItemInHand() != 0) {
                            $sender->getItemInHand()->setCustomName($args[1]);
                        } else {
                            $sender->sendMessage(TextFormat::RED . "You can set name of item : Air");
                        }
                    }
            }
        }
    }
}
