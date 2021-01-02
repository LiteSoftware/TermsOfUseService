<?php

declare(strict_types=1);

include_once 'app/domain/repositories/SystemConfigRepositoryInterface.php';
include_once 'app/data/entities/SystemConfig.php';
include_once 'app/core/entities/Environment.php';
include_once 'app/data/repositories/ProductionSystemConfigRepository.php';

include_once 'app/core/config/init/IBuilder.php';
include_once 'app/core/config/init/SystemConfigurationBuilder.php';
include_once 'app/core/config/init/SystemConfigFactory.php';
include_once 'app/di/EnvironmentFactory.php';

include_once 'app/utils/SystemUtils.php';

SystemUtils::autoloadClasses();
