<?php

require_once "vendor/autoload.php";

class SystemUtils {

    private static $directories = [];

    private function __construct() {  
    }
    
    public static function initSystemConfig() {
        $systemConfig = SystemConfigFactory::get()->getConfig();
        self::setIniConfig($systemConfig);
        self::setHttpHeaders($systemConfig);
        
        return $systemConfig;
    }

    public static function setIniConfig(SystemConfig $systemConfig) {
        ini_set('max_execution_time', (string)$systemConfig->getMaxExecutionTime());
        ini_set('memory_limit', (string)$systemConfig->getMemoryLimit());
        ini_set('display_errors', (string)$systemConfig->getDisplayErrors());
        error_reporting($systemConfig->getErrorLevel());
    }

    public static function setHttpHeaders(SystemConfig $systemConfig) {
        header('Cache-Control: max-age=' . $systemConfig->getCacheControl());
    }

    public static function scanDir(String $dir = 'app') {
        $dir .= '/';
        $cDir = scandir($dir);
        self::$directories[] = $dir;

        foreach ($cDir as $innerDir) {
            if (!in_array($innerDir, array(".", ".."))) {
                if (is_dir($dir . $innerDir)) {
                    self::scanDir($dir . $innerDir);
                }
            }
        }
    }

    public static function autoloadClasses() {
        self::scanDir();

        spl_autoload_register(function (string $class_name) : void {
            $rootDir = EnvironmentFactory::getEnvironment()->getRootDir();
            foreach(self::$directories as $directory) {
                if(file_exists($rootDir . $directory . $class_name . '.php')) {
                    include_once($rootDir . $directory . $class_name . '.php');
                    return;
                }           
            }
        });
    }
}