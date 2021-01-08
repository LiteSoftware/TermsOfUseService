<?php

abstract class BaseController {

    protected $view;

	private function getView() : BaseView {
		return $this->view;
	}

	protected function onError(Exception $exception) {
		$this->getView()->showError($exception->getMessage());
	}

	public function renderPage() {
		$this->getView()->render();
    }
    
    protected function callWithCatchError(Callable $function) {
        try {
            $function();
        } catch(BaseException $ex) {
            $this->onError($ex);
        }
    }
}