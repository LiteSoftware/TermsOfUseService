<?php

class UserAgreementController extends BaseController implements UserAgreementControllerInterface {

    private $getRepository;
    
    public function __construct(
        UserAgreementViewInterface $userAgreementView,
        GlobalVarRepository $getRepository
    ) {
        $this->view = $userAgreementView;
        $this->getRepository = $getRepository;
    }


    public function actionRead() {
        
    }
}