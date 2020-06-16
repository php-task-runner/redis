<?php

declare(strict_types=1);

namespace TaskRunner\Redis\TaskRunner\Commands;

use OpenEuropa\TaskRunner\Commands\AbstractCommands;
use Predis\Client;

/**
 * Provides commands for Redis cache backend.
 */
class RedisCommands extends AbstractCommands
{
    /**
     * Flushes the Redis backend.
     *
     * @command redis:flush-all
     */
    public function flushAll(): void
    {
        $parameters = array_filter([
            'host' => getenv('REDIS_HOST'),
            'port' => getenv('REDIS_PORT'),
            'password' => getenv('REDIS_PASSWORD'),
        ]);
        (new Client($parameters))->flushall();
        $this->say('Redis backend flushed');
    }
}
