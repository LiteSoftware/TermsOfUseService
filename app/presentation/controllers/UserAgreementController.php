<?php

/**
 * @property UserAgreementViewInterface $view
 */

class UserAgreementController extends BaseController implements UserAgreementControllerInterface {
    
    public function __construct(UserAgreementViewInterface $userAgreementView ) {
        $this->view = $userAgreementView;
    }

    public function actionTerms() {
        $this->view->setTemplate('user_agreement', 'html');
    }

    public function actionPolicy() {
        $this->view->setTemplate('private_policy', 'html');
    }
}