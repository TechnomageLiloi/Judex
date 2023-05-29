<?php

namespace Liloi\Judex;

/**
 * Log data class.
 *
 * @package Log
 */
class LogData
{
    /**
     * Message value.
     *
     * @var string
     */
    private $message;

    /**
     * Tags value.
     *
     * @var string
     */
    private $tags;

    /**
     * Data object value.
     *
     * @var array
     */
    private $data;

    /**
     * Data log constructor.
     *
     * @param string $message Message.
     * @param string $tags Tags.
     * @param array $data Data.
     */
    public function __construct(
        string $message,
        string $tags,
        array $data = []
    )
    {
        $this->message = $message;
        $this->tags = $tags;
        $this->data = $data;
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Get tags.
     *
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * Get array of data objects.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Get array element of data objects by key.
     *
     * @param string $key Data key.
     * @return mixed
     */
    public function getDataElement(string $key)
    {
        return $this->data[$key];
    }
}