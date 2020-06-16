<?php

declare(strict_types=1);

namespace TaskRunner\Redis\Tests;

use PHPUnit\Framework\TestCase;
use Predis\Client;

/**
 * @coversDefaultClass \TaskRunner\Redis\TaskRunner\Commands\RedisCommands
 */
class RedisCommandsTest extends TestCase
{
    /**
     * @covers ::flushAll
     */
    public function testFlush(): void
    {
        $redis = new Client();
        $redis->set('foo', 'bar');
        $this->assertSame('bar', $redis->get('foo'));
        $output = exec(__DIR__ . '/../../vendor/bin/run redis:flush-all');
        $this->assertStringContainsString('Redis backend flushed', $output);
        $this->assertNull($redis->get('foo'));
    }
}
