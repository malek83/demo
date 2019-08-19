<?php

$container = [];

$container[\App\Service\TreeService::class] = function(\Psr\Container\ContainerInterface $c) {
    return new \App\Service\TreeService(
        $c->get(\App\Repository\NodeRepository::class),
        $c->get(\App\Builder\TreeStructureBuilder::class)
    );
};

$container[\App\Repository\NodeRepository::class] = function(\Psr\Container\ContainerInterface $c) {
    return new \App\Repository\NodeRepository($c->get(\App\Db\Connection::class));
};

$container[\App\Db\Connection::class] = function(\Psr\Container\ContainerInterface $c) {
    return new \App\Db\Connection(
        $c->get(\PDO::class)
    );
};

$container[\PDO::class] = function(\Psr\Container\ContainerInterface $c) {
    return new \PDO(
        getenv('DB_CONNECTION'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );
};

$container[\App\Builder\TreeStructureBuilder::class] = function(\Psr\Container\ContainerInterface $c) {
    return new \App\Builder\TreeStructureBuilder();
};

return $container;
