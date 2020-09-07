<?php

namespace PhpJudex\Checks\CheckNotNull;

use PhpJudex\Checks\AbstractCheck;

/**
 * Assert check: $this->verifiedValue !== null
 *
 * @package Assert
 */
class Check extends AbstractCheck
{
    /**
     * @inheritDoc
     */
    public function verify(): bool
    {
        return $this->verifiedValue !== null;
    }
}