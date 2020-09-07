<?php

namespace PhpJudex\Exceptions;

use Throwable;

/**
 * Exception class with extended functional.
 *
 * @package Exceptions
 */
class JudexException extends \Exception
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Judex exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0;

    /**
     * Exception data.
     *
     * @var array
     */
    private $data;

    /**
     * JudexException constructor.
     *
     * @param string|null $message
     * @param string|int|null $code
     * @param Throwable|null $previous
     * @param array|null $data
     */
    public function __construct(
        string $message = null,
        $code = null,
        Throwable $previous = null,
        array $data = null
    )
    {
        if($message === null)
        {
            $message = $this->defaultMessage;
        }

        if($code === null)
        {
            $code = $this->defaultCode;
        }

        if($data === null)
        {
            $data = [];
        }

        parent::__construct($message, 0, $previous);
        $this->code = $code;

        $this->setData($data);
    }

    /**
     * Set exception data array.
     *
     * @param array $data Exception data array.
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get exception data array.
     *
     * @return array Exception data array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set exception data element.
     *
     * @param string $name Name of the data element.
     * @param mixed $value Data element
     */
    public function setDataElement(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Get exception data element.
     *
     * @param string $name Name of the data element.
     * @return mixed Exception data element.
     */
    public function getDataElement(string $name)
    {
        // @todo assert element is under this name.
        return $this->data[$name];
    }
}