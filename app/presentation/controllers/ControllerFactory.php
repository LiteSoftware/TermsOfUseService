<?php

class ControllerFactory {

    public static function userAgreementController() : UserAgreementControllerInterface {
        $userAgreementView = ViewFactory::createUserAgreementView();
        $requestGet = GlobalVarsRepositoryFactory::createGlobalVarGet();

        return new UserAgreementController($userAgreementView, $requestGet);
    }
}