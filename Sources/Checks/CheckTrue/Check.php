<?php

namespace Judex\Checks\CheckTrue;

use Judex\Checks\AbstractCheck;

/**
 * Assert check: $this->verifiedValue === true
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
        return $this->verifiedValue === true;
    }
}