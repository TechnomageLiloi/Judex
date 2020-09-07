<?php

namespace Judex\Checks\CheckTrue;

use Judex\Checks\Exception as ChecksException;

/**
 * Exception: True expected, but different value provided.
 *
 * @package Assert
 */
class Exception extends ChecksException
{
    /**
     * @inheritDoc
     */
    protected $defaultMessage = 'True expected, but different value provided.';

    /**
     * @inheritDoc
     */
    protected $defaultCode = 0x01;
}