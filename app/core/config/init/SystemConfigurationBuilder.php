<?php

class SystemConfigurationBuilder extends SystemConfig implements IBuilder {
    
    public function setRootDir(String $rootDir) : self {
        $this->rootDir = $rootDir;
        return $this;
    }

    public function setHttpHost(String $httpHost) : self {
        $this->httpHost = $httpHost;
        return $this;
    }

    public function setRequestUri(String $requestUri) : self {
        $this->requestUri = $requestUri;
        return $this;
    }

    public function setServiceName(String $serviceName) : self {
        $this->serviceName = $serviceName;
        return $this;
    }

    public function setTemplateDir(String $templateDir) : self {
        $this->templateDir = $templateDir;
        return $this;
    }

    public function setMaxExecutionTime(Int $maxExecutionTime) : self {
        $this->maxExecutionTime = $maxExecutionTime;
        return $this;
    }

    public function setMemoryLimit(String $memoryLimit) {
        $this->memoryLimit = $memoryLimit;
        return $this;
    }

    public function setDisplayErrors(Int $displayErrors) : self {
        $this->displayErrors = $displayErrors;
        return $this;
    }

    public function setErrorLevel(Int $errorLevel) : self {
        $this->errorLevel = $errorLevel;
        return $this;
    }

    public function setCacheControl(int $maxAge) : self {
        $this->cacheControl = $maxAge;
        return $this;
    }
    
    public function build() : SystemConfig {
        $systemConfig = new SystemConfig($this);
        return $systemConfig;
    }
}