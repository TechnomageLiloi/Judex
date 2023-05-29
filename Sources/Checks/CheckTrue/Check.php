<?php

namespace Liloi\Judex\Checks\CheckTrue;

use Liloi\Judex\Checks\AbstractCheck;

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