<?php

namespace Liloi\Judex\Checks;

use Liloi\Judex\Exceptions\GeneralException;

/**
 * Abstract for different assert exceptions.
 *
 * @package Assert
 */
class Exception extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Abstract assert exception.';
}