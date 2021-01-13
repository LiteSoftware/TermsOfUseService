<?php

/**
 * @property UserAgreementViewInterface $view
 */

class UserAgreementController extends BaseController implements UserAgreementControllerInterface {
    
    public function __construct(UserAgreementViewInterface $userAgreementView ) {
        $this->view = $userAgreementView;
    }

    public function actionRead() {
        $this->view->setTemplate('user_agreement', 'html');
    }
}