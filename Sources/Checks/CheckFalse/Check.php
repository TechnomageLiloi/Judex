<?php

namespace PhpJudex\Checks\CheckFalse;

use PhpJudex\Checks\AbstractCheck;

/**
 * Assert check: verifiedValue === false
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
        return $this->verifiedValue === false;
    }
}