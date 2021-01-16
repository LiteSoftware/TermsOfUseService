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
        HttpHeaderRepositoryInterface $httpHeaderRepository 
    ) {
        $this->view = $userAgreementView;
        $langHeader = $httpHeaderRepository->getHeader('Accept-Language')->getValue();
        $this->langText = !empty($langHeader) ? $langHeader : self::DEFAULT_LANG;
    }

    public function actionTerms() {
        $this->view->setTemplate('user_agreement_' . $this->langText, 'html');
    }

    public function actionPolicy() {
        $this->view->setTemplate('private_policy_' . $this->langText, 'html');
    }
}