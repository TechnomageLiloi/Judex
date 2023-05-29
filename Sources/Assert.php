<?php

namespace Liloi\Judex;

use Liloi\Judex\Checks\AbstractCheck;
use Liloi\Judex\Exceptions\File\NotFoundException;

/**
 * Assertion.
 *
 * @method static void true($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @method static void false($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @method static void null($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @method static void notNull($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @method static void empty($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @method static void notEmpty($verifiedValue, string $manualMessage = null, $code, array $manualData = null)
 * @package Assert
 */
class Assert
{
    /**
     * @param string $name Name of method.
     * @param array $arguments Three elements.
     * @throws \Exception Not existent check.
     */
    public static function __callStatic($name, $arguments)
    {
        $checkClass = sprintf('Liloi\Judex\\Checks\\Check%s\\Check', ucfirst($name));

        if(!class_exists($checkClass))
        {
            throw NotFoundException::create($checkClass);
        }

        $verifiedValue = $arguments[0];

        /** @var AbstractCheck $check */
        $check = new $checkClass($verifiedValue);
        if(!$check->verify())
        {
            $exceptionClass = sprintf('Liloi\Judex\\Checks\\Check%s\\Exception', ucfirst($name));

            if(!class_exists($exceptionClass))
            {
                throw NotFoundException::create($exceptionClass);
            }

            $manualMessage = $arguments[1] ?? null;
            $manualCode = $arguments[2] ?? null;
            $manualData = $arguments[3] ?? null;

            throw new $exceptionClass($manualMessage, $manualCode, null, $manualData);
        }
    }
}