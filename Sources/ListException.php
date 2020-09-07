<?php

namespace Judex;

use Judex\Exceptions\JudexException;
use Throwable;

/**
 * List of exceptions.
 *
 * @package Exceptions
 */
class ListException extends \Exception
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'List of exception.';

    /**
     * Exceptions list.
     *
     * @var array
     */
    private $data;

    /**
     * List exception constructor.
     *
     * @param array $exceptions Array of exceptions
     */
    public function __construct(array $exceptions)
    {
        parent::__construct($this->defaultMessage);
        $this->setExceptions($exceptions);
    }

    /**
     * Set exception array.
     *
     * @param array $exceptions Exception data array.
     */
    public function setExceptions(array $exceptions)
    {
        $this->data = $exceptions;
    }

    /**
     * Get exception array.
     *
     * @return array Exception data array
     */
    public function getExceptions(): array
    {
        return $this->data;
    }

    /**
     * Set exception data element.
     *
     * @param string $name Name of the data exception.
     * @param \Exception $exception Exception.
     */
    public function setException(string $name, $exception)
    {
        $this->data[$name] = $exception;
    }

    /**
     * Get exception element by name.
     *
     * @param string $name Name of the exception element.
     * @return mixed Exception element.
     */
    public function getException(string $name)
    {
        // @todo assert element is under this name.
        return $this->data[$name];
    }
}