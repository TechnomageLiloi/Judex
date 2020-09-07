<?php

namespace PhpJudex;

use PhpJudex\Checks\AbstractCheck;

/**
 * Assertion.
 *
 * @method static void true($verifiedValue, string $manualMessage = null, array $manualData = null)
 * @method static void false($verifiedValue, string $manualMessage = null, array $manualData = null)
 * @method static void null($verifiedValue, string $manualMessage = null, array $manualData = null)
 * @method static void notNull($verifiedValue, string $manualMessage = null, array $manualData = null)
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
        $checkClass = sprintf('PhpJudex\\Checks\\Check%s\\Check', ucfirst($name));

        if(!class_exists($checkClass))
        {
            throw new \Exception(); // @todo Change to ours.
        }

        $verifiedValue = $arguments[0];

        /** @var AbstractCheck $check */
        $check = new $checkClass($verifiedValue);
        if(!$check->verify())
        {
            $exceptionClass = sprintf('PhpJudex\\Checks\\Check%s\\Exception', ucfirst($name));

            if(!class_exists($exceptionClass))
            {
                throw new \Exception(); // @todo Change to ours.
            }

            $manualMessage = $arguments[1] ?? null;
            $manualData = $arguments[2] ?? null;

            throw new $exceptionClass($manualMessage, null, null, $manualData);
        }
    }
}