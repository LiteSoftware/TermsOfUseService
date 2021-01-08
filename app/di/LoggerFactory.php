<?php

use Monolog\Logger;
use Monolog\Formatter\ChromePHPFormatter;

use Monolog\Handler\ChromePHPHandler;

class LoggerFactory {
    
    public static function createLogger(string $loggerName, bool $chromeHandlerEnabled = false) : Logger {
        $logger = new Logger($loggerName);
        $logger->pushHandler(new MonologDbHandler(Logger::INFO, DatabaseFactory::getEntityManager()));

        if ($chromeHandlerEnabled) {
            $devHandler = new ChromePHPHandler(Logger::DEBUG);
            $devHandler->setFormatter(new ChromePHPFormatter());
            
            $infoFilterHandler = new \Monolog\Handler\FilterHandler(
                $devHandler,
                \Monolog\Logger::DEBUG,
                \Monolog\Logger::DEBUG);
            $logger->pushHandler($infoFilterHandler);
        }
        return $logger;
    }
}