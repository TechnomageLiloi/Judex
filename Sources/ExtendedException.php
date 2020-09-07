<?php

namespace PhpJudex;

use PhpJudex\Exceptions\JudexException;

/**
 * Extend from {@link JudexException} for other programmers to use.
 *
 * @package Exceptions
 */
class ExtendedException extends JudexException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Extended exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x100;
}