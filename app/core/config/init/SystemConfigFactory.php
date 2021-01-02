<?php

class SystemConfigFactory {
    
    public static $instance;
    
    public static function get() : SystemConfigRepositoryInterface {
        if(empty(self::$instance)) {
            self::$instance = new ProductionSystemConfigRepository;
        }
        return self::$instance;
    }
}