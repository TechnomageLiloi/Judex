<?php

namespace PhpJudex\Checks;

use PhpJudex\Exceptions\GeneralException;

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