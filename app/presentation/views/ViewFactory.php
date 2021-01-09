<?php

class ViewFactory {
    
    public static function createUserAgreementView() : UserAgreementViewInterface {
        
        return new UserAgreementView();
    }
}