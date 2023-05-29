<?php

namespace Liloi\Judex\Checks\CheckNotNull;

use Liloi\Judex\Checks\Exception as ChecksException;

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
    protected $defaultMessage = 'Not null expected, but different value provided.';

    /**
     * @inheritDoc
     */
    protected $defaultCode = 0x04;
}