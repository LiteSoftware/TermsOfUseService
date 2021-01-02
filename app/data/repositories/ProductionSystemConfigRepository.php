<?php

class ProductionSystemConfigRepository implements SystemConfigRepositoryInterface {

    private $systemConfig;

    private const DEFAULT_SERVICE_DIRNAME = '/TermsOfUseService/';

    private const DEFAULT_TEMPLATE_DIRNAME = 'template/';

    private const DEFAULT_MAX_EXECUTION_TIME = 120;

    private const DEFAULT_MEMORY_LIMIT = '1024M';

    private const DEFAULT_DISPLAY_ERRORS = 1;

    private const ERROR_LEVEL = -1;

    private const MAX_AGE_IN_SECONDS = 1209600;

    private const HTTP_PROTOCOL = 'http://';

    private const HTTPS_PROTOCOL = 'https://';

    private const TEST_HOST = 'apis.com';

    public function __construct() {
        $protocol = trim($_SERVER['SERVER_NAME']) == self::TEST_HOST ? self::HTTP_PROTOCOL : self::HTTPS_PROTOCOL;
        $documentRoot = $_SERVER["DOCUMENT_ROOT"] . self::DEFAULT_SERVICE_DIRNAME;
        $this->systemConfig = SystemConfig::createBuilder()->setServiceName(self::DEFAULT_SERVICE_DIRNAME)
                                                           ->setRootDir($documentRoot)
                                                           ->setHttpHost($protocol . $_SERVER["HTTP_HOST"])
                                                           ->setRequestUri($_SERVER["REQUEST_URI"])
                                                           ->setTemplateDir($documentRoot . self::DEFAULT_TEMPLATE_DIRNAME)
                                                           ->setMaxExecutionTime(self::DEFAULT_MAX_EXECUTION_TIME)
                                                           ->setMemoryLimit(self::DEFAULT_MEMORY_LIMIT)
                                                           ->setDisplayErrors(self::DEFAULT_DISPLAY_ERRORS)
                                                           ->setErrorLevel(self::ERROR_LEVEL)
                                                           ->setCacheControl(self::MAX_AGE_IN_SECONDS);
    }

    public function getConfig() : SystemConfig {
        return $this->systemConfig;
    }

}