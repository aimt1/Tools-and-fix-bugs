<?php
declare(strict_types = 1);

namespace aimt1_tools;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

use function array_diff;
use function scandir;

class Main extends PluginBase {
    private $config;

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->getLogger()->info("Tools and fix bugs enabled!");

        foreach(array_diff(scandir($this->getServer()->getDataPath() . "worlds"), ["..", "."]) as $levelName){
			if($this->getServer()->loadLevel($levelName)){
				$this->getLogger()->debug("Successfully loaded §6${levelName}");
			}
        }
    }

    public function getConfigValue($key) {
        return $this->config->get($key);
    }
    
    public function onDisable() {
        $this->getLogger()->info("Tools and fix bugs disabled!");
    }
}
