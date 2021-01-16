<?php

class ControllerFactory {

    public static function userAgreementController() : UserAgreementControllerInterface {
        $userAgreementView = ViewFactory::createUserAgreementView();
        $httpHeaderRepository = RepositoriesFactory::createHttpHeaderRepository();

        return new UserAgreementController($userAgreementView, $httpHeaderRepository);
    }
}