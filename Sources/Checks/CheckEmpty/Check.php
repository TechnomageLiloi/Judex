<?php

namespace Liloi\Judex\Checks\CheckEmpty;

use Liloi\Judex\Checks\AbstractCheck;

/**
 * Assert check: empty($this->verifiedValue
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
        return empty($this->verifiedValue);
    }
}