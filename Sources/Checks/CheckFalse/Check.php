<?php

namespace Judex\Checks\CheckFalse;

use Judex\Checks\AbstractCheck;

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