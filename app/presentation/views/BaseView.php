<?php

abstract class BaseView implements BaseViewInterface {

    protected $content = null;

    protected $title = null;

    protected $meta_keywords = null;

    protected $styles = [];
    
    protected $typeDocument = 'json';

    protected $template = null;

    protected $environment;
    
    function __construct(string $template) {
        $this->template = $template;
        $this->environment = EnvironmentFactory::getEnvironment();
    }

    public function render() {
        $this->initializeHeaders();
        $this->renderPage();
    }

    public function includeHeaderTemplate() {
        include_once($this->environment->getTemplateDir() . 'header.php');
    }

    private function renderPage() {
        if ($this->typeDocument == 'html') {
            $this->includeHeaderTemplate();
            $this->includeBodyTemplate();
            $this->includeFooterTemplate();
        } else {
            $this->includeBodyTemplate();
        }
    }

    public function includeBodyTemplate() {
        include_once($this->environment->getTemplateDir() . $this->template .'.php');
    }

    public function includeFooterTemplate() {
        include_once($this->environment->getTemplateDir() . 'footer.php');
    }
    
    public function showError(string $message) {
        $this->setContent($message);
    }

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setMetaKeywords($meta_keywords) {
        $this->meta_keywords = $meta_keywords;
    }
    
	public function setStyles($cssFiles) {
		$this->styles = $cssFiles;
    }
    
    public function setTemplate(string $name, string $type = 'json') {
        $this->template = $name;
        $this->typeDocument = $type;
    }

    abstract function initializeHeaders();
}