<?php

use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;

class MonologDbHandler extends AbstractProcessingHandler {
    
    private $entityManager;

    public function __construct(int $loggerLevel, EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        parent::__construct($loggerLevel);
    }

    public function write(array $record) : void {
        $logEntry = new LogItem();
        $logEntry->setMessage($record['message']);
        $logEntry->setLevel($record['level']);
        $logEntry->setChannel($record['channel']);
        $logEntry->setLevelName($record['level_name']);

        if(is_array($record['extra']))
        {
            $logEntry->setExtra($record['extra']);
        } else {
            $logEntry->setExtra([]);
        }

        if (is_array($record['context'])) {
            $logEntry->setExtra($record['context']);
        } else {
            $logEntry->setExtra([]);
        }
        $logEntry->setCreatedAt(new DateTime());

        $this->entityManager->persist($logEntry);
        $this->entityManager->flush();
    }
}