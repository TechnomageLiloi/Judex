<?php

namespace Liloi\Judex\Checks\CheckFalse;

use Liloi\Judex\Checks\AbstractCheck;

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