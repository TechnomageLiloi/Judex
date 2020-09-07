<?php

namespace Judex\Checks;

/**
 * Abstract assert check.
 *
 * @package Assert
 */
abstract class AbstractCheck
{
    /**
     * Value, that would be verified.
     *
     * @var mixed
     */
    protected $verifiedValue;

    /**
     * Manual message, that would be inserted in exception, if assertion fails.
     *
     * @var string
     */
    protected $manualMessage;

    /**
     * Data, that would be inserted in exception, if assertion fails.
     *
     * @var array
     */
    protected $manualData;

    /**
     * Check constructor.
     *
     * @param mixed $verifiedValue Value, that would be verified.
     * @param string|null $manualMessage Manual message, that would be inserted in exception, if assertion fails.
     * @param array|null $manualData Data, that would be inserted in exception, if assertion fails.
     */
    public function __construct(
        $verifiedValue,
        string $manualMessage = null,
        array $manualData = null
    )
    {
        $this->verifiedValue = $verifiedValue;
        $this->manualMessage = $manualMessage;
        $this->manualData = $manualData;
    }

    /**
     * Verify value.
     *
     * @return bool <tt>true</tt> if verify passes, <tt>false</tt> otherwise.
     */
    abstract public function verify(): bool;
}