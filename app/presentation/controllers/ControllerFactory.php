<?php

class ControllerFactory {

    public static function userAgreementController() : UserAgreementControllerInterface {
        $userAgreementView = ViewFactory::createUserAgreementView();

        return new UserAgreementController($userAgreementView);
    }
}