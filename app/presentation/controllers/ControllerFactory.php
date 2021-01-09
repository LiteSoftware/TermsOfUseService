<?php

class ControllerFactory {

    public static function userAgreementController() : UserAgreementControllerInterface {
        $userAgreementView = ViewFactory::createUserAgreementView();
        $getRepository = new GlobalGetRepository();

        return new UserAgreementController($userAgreementView, $getRepository);
    }
}