<?php

class UserAgreementView extends BaseView implements UserAgreementViewInterface {

    protected $pathToTemplate;

    public function __construct() {
        parent::__construct('user_agreement');
        $environment = EnvironmentFactory::getEnvironment();
        $this->pathToTemplate = $environment->getHost() . $environment->getServiceName() . 'template/';
    }

    public function initializeHeaders() {
        $this->setTitle("User Agreement");
        $this->setStyles([
            "style.css"
        ]);
    }
}