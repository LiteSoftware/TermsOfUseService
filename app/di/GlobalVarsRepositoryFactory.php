<?php

class GlobalVarsRepositoryFactory {
    
    public static function createGlobalVarGet() {
        return new GlobalGetRepository();
    }
}