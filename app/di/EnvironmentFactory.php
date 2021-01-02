<?php

class EnvironmentFactory {
    
    public static $instance;
    
    public static function getEnvironment() : Environment {
        if(empty(self::$instance)) {
            $systemConfig = SystemUtils::initSystemConfig();
            self::$instance = new Environment(
                $systemConfig->getRootDir(), 
                $systemConfig->getHttpHost(),
                $systemConfig->getRequestUri(),
                $systemConfig->getTemplateDir(),
                $systemConfig->getServiceName()
            );
        }
        return self::$instance;
    }
}