<?php

namespace Liloi\Judex\Simple;

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
    protected $defaultMessage = 'Abstract simple exception.';
}