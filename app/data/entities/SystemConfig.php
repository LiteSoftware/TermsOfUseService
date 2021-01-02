<?php

class SystemConfig {
    
    protected $rootDir;

    protected $httpHost;

    protected $requestUri;

    protected $serviceName;

    protected $templateDir;

    protected $maxExecutionTime;

    protected $memoryLimit;
    
    protected $displayErrors;

    protected $errorLevel;

    protected $cacheControl;

    public function getRootDir() : string {
        return $this->rootDir;
    }

    public function getHttpHost() : string {
        return $this->httpHost;
    }

    public function getRequestUri() : string {
        return $this->requestUri;
    }

    public function getServiceName() : string {
        return $this->serviceName;
    }

    public function getTemplateDir() : string {
        return $this->templateDir;
    }
    
    public function getMaxExecutionTime() : int {
        return $this->maxExecutionTime;
    }
    
    public function getMemoryLimit() : string {
        return $this->memoryLimit;
    }

    public function getDisplayErrors() : int {
        return $this->displayErrors;
    }

    public function getErrorLevel() : int {
        return $this->errorLevel;
    }

    public function getCacheControl() : int {
        return $this->cacheControl;
    }

    protected function __construct(SystemConfigurationBuilder $builder = null) {
        if (is_null($builder)) return;

        $this->rootDir = $builder->rootDir;
        $this->httpHost = $builder->httpHost;
        $this->requestUri = $builder->requestUri;
        $this->serviceName = $builder->serviceName;
        $this->templateDir = $builder->templateDir;
        $this->maxExecutionTime = $builder->maxExecutionTime;
        $this->memoryLimit = $builder->memoryLimit;
        $this->displayErrors = $builder->displayErrors;
        $this->errorLevel = $builder->errorLevel;
        $this->cacheControl = $builder->cacheControl;
    }

    public static function createBuilder() : SystemConfigurationBuilder {
        return new SystemConfigurationBuilder;
    }
}