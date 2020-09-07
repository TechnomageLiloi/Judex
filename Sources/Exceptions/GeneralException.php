<?php

namespace PhpJudex\Exceptions;

/**
 * Extend from {@link JudexException) for different exceptions in this library (i.e.
 * NotImplementedException, DivideByZeroException, all assert exceptions, etc).
 *
 * @package Exceptions
 */
class GeneralException extends JudexException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'General exception.';
}