<?php

class Environment {

    private $rootDir;
    
    private $host;

    private $uri;

    private $templateDir;

    private $serviceName;
    
    public function __construct(
        string $rootDir, 
        string $host, 
        string $uri, 
        string $templateDir,
        string $serviceName
    ) {
        $this->rootDir = $rootDir;
        $this->host = $host;
        $this->uri = $uri;
        $this->templateDir = $templateDir;
        $this->serviceName = $serviceName;
    }
    
    public function getRootDir() : string {
        return $this->rootDir;
    }
    
    public function getHost() : string {
        return $this->host;
    }

    public function getURI() : string {
        return $this->uri;
    }

    public function getServiceName(): string {
        return $this->serviceName;
    }

    public function getTemplateDir(): string {
        return $this->templateDir;
    }
}