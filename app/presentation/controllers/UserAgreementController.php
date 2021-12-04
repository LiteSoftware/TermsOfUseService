<?php

/**
 * @property UserAgreementViewInterface $view
 * @property HttpHeaderRepositoryInterface $httpHeaderRepository
 */

class UserAgreementController extends BaseController implements UserAgreementControllerInterface
{

    private const DEFAULT_LANG = 'en';

    private const DEFAULT_DIR = 'android/';

    private $langText;

    private $app;

    public function __construct(
        UserAgreementViewInterface $userAgreementView,
        GlobalVarRepository $requestGet
    )
    {
        $this->view = $userAgreementView;
        $this->langText = $requestGet->getString('language', self::DEFAULT_LANG);
        $app = $requestGet->getString('app', '');
        $this->app = empty($app) ? '' : self::DEFAULT_DIR . $app . '/';
    }

    public function actionTerms()
    {
        $this->view->setTemplate($this->app . 'user_agreement_' . $this->langText, 'html');
    }

    public function actionPolicy()
    {
        $this->view->setTemplate($this->app . 'private_policy_' . $this->langText, 'html');
    }
}