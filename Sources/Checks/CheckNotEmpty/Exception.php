<?php

namespace PhpJudex\Checks\CheckNotEmpty;

use PhpJudex\Checks\Exception as ChecksException;

/**
 * Exception: Not empty expected, but empty value provided.
 *
 * @package Assert
 */
class Exception extends ChecksException
{
    /**
     * @inheritDoc
     */
    protected $defaultMessage = 'Not empty expected, but empty value provided.';

    /**
     * @inheritDoc
     */
    protected $defaultCode = 0x06;
}