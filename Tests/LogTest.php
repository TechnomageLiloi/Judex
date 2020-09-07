<?php

namespace Judex;

use PHPUnit\Framework\TestCase;
use Judex\Log;
use Judex\LogData;

/**
 * Check Log class.
 */
class LogTest extends TestCase
{
    /**
     * Tests {@link Log} class (callback methods).
     *
     * * Arrange: defines {@link Log}.
     * * Act: calls {@link Log::set()} and {@link Log::get()} methods.
     * * Assert: checks values.
     */
    public function testCallbackMethods()
    {
        $f = function () {

        };

        $id = 'test';

        Log::set($id, $f);

        $this->assertEquals($f, Log::get($id));
    }

    /**
     * Tests {@link Log} class ({@link Log::call()}).
     *
     * * Arrange: defines {@link Log}, calls {@link Log::set()} method.
     * * Act: calls {@link Log::call()}.
     * * Assert: checks values.
     */
    public function testLogCall()
    {
        $message = 'test message';
        $tags = 'test tags';
        $data = ['a' => 'b'];

        $f = function (LogData $logData) use ($message, $tags, $data) {
            $this->assertEquals($message, $logData->getMessage());
            $this->assertEquals($tags, $logData->getTags());
            $this->assertEquals($data, $logData->getData());
            $this->assertEquals('b', $logData->getDataElement('a'));
        };

        $id = 'test';

        Log::set($id, $f);

        Log::call($message, $tags, $data);
    }

    /**
     * Tests {@link Log} class ({@link Log::callException()}).
     *
     * * Arrange: defines {@link Log}, calls {@link Log::set()} method.
     * * Act: calls {@link Log::callException()}.
     * * Assert: checks values.
     */
    public function testLogCallException()
    {
        $message = 'test message';
        $tags = 'test tags';
        $data = ['a' => 'b'];

        $e = new \Exception($message);

        $f = function (LogData $logData) use ($message, $tags, $data, $e) {
            $this->assertEquals($message, $logData->getMessage());
            $this->assertEquals($tags, $logData->getTags());
            $this->assertEquals('b', $logData->getDataElement('a'));
            $this->assertEquals($e, $logData->getDataElement('exception'));
        };

        $id = 'test';

        Log::set($id, $f);

        Log::callException($e, $tags, $data);
    }
}