<?php

/**
 * @property UserAgreementViewInterface $view
 * @property HttpHeaderRepositoryInterface $httpHeaderRepository
 */

class UserAgreementController extends BaseController implements UserAgreementControllerInterface {
    
    private const DEFAULT_LANG = 'en';

    private $langText;

    public function __construct(
        UserAgreementViewInterface $userAgreementView, 
        GlobalVarRepository $requestGet 
    ) {
        $this->view = $userAgreementView;
        $this->langText = $requestGet->getString('language', self::DEFAULT_LANG);
    }

    public function actionTerms() {
        $this->view->setTemplate('user_agreement_' . $this->langText, 'html');
    }

    public function actionPolicy() {
        $this->view->setTemplate('private_policy_' . $this->langText, 'html');
    }
}