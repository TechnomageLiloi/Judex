<?php

namespace Judex\Checks\CheckFalse;

use Judex\Checks\Exception as ChecksException;

/**
 * Exception: False expected, but different value provided.
 *
 * @package Assert
 */
class Exception extends ChecksException
{
    /**
     * @inheritDoc
     */
    protected $defaultMessage = 'False expected, but different value provided.';

    /**
     * @inheritDoc
     */
    protected $defaultCode = 0x02;
}