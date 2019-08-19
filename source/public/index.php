<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$controllerName = 'index';

$application = new \App\Application($_REQUEST);

$application->run();
