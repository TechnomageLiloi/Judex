<?php

namespace Liloi\Judex\Checks\CheckNull;

use Liloi\Judex\Checks\AbstractCheck;

/**
 * Assert check: $this->verifiedValue === null
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
        return $this->verifiedValue === null;
    }
}