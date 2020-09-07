<?php

namespace Judex\Checks\CheckNull;

use Judex\Checks\Exception as ChecksException;

/**
 * Exception: Null expected, but different value provided.
 *
 * @package Assert
 */
class Exception extends ChecksException
{
    /**
     * @inheritDoc
     */
    protected $defaultMessage = 'Null expected, but different value provided.';

    /**
     * @inheritDoc
     */
    protected $defaultCode = 0x03;
}