<?php

require_once "doctrine-config.php";
require_once "app/domain/database/DatabaseFactory.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(DatabaseFactory::getEntityManager());
