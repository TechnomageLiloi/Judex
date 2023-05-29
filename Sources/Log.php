<?php

namespace Liloi\Judex;

use Liloi\Judex\Assert;

/**
 * Log wrap.
 *
 * @package Log
 */
class Log
{
    /**
     * Callback handlers.
     *
     * @var array
     */
    static private $arrCalls = [];

    /**
     * Set callback handler at log trigger.
     *
     * @param string $uniqueId Unique ID of callable.
     * @param callable $f Callable.
     */
    public static function set(string $uniqueId, callable $f)
    {
        Assert::notEmpty($uniqueId);
        self::$arrCalls[$uniqueId] = $f;
    }

    /**
     * Get callback handler at log trigger.
     *
     * @param string $uniqueId Unique ID of callable.
     * @return callable Callable.
     */
    public static function get(string $uniqueId): callable
    {
        Assert::notEmpty($uniqueId);

        // @todo $uniqueId Assert Not Empty in Calls array.

        return self::$arrCalls[$uniqueId];
    }

    /**
     * Add log.
     *
     * @param string $message Message.
     * @param string $tags Tags.
     * @param array $data Data.
     */
    public static function call(string $message, string $tags = '', array $data = []): void
    {
        $logData = new LogData($message, $tags,$data);

        foreach (self::$arrCalls as $f)
        {
            $f($logData);
        }
    }

    /**
     * Add exception log.
     *
     * @param \Throwable $e Exception.
     * @param string $tags Tags.
     * @param array $data Data.
     */
    public static function callException(\Throwable $e, string $tags = '', array $data = []): void
    {
        $exceptionMessage = $e->getMessage();
        $message = !empty($exceptionMessage) ? $exceptionMessage : get_class($e);

        $data['exception'] = $e;
        $logData = new LogData($message, $tags, $data);

        foreach (self::$arrCalls as $f)
        {
            $f($logData);
        }
    }
}