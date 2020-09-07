<?php

namespace Judex\Checks;

use Judex\Exceptions\GeneralException;

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