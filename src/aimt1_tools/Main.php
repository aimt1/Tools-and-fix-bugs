<?php
namespace aimt1_tools;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {
    private $config;

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->getLogger()->info("Tools and fix bugs enabled!");
    }

    public function getConfigValue($key) {
        return $this->config->get($key);
    }
    
    public function onDisable() {
        $this->getLogger()->info("Tools and fix bugs disabled!");
    }
}
